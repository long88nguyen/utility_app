<?php

namespace App\Services;

use App\Models\Member;
use App\Models\Product;
use App\Services\DataType\DataTypeInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class MemberService
{
    public function find($id)
    {
        DB::beginTransaction();

        try {
            $result = Member::with('books')->where('members.id', $id)->first();

            DB::commit();
            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function store(array $params)
    {
        try{
            DB::beginTransaction();
        
            $data = [
                'name' => $params['name'],
                'birthday' =>  $params['birthday'],
                'gender' => $params['gender'],
                'user_id' => $params['user_id'],
            ];
               
            $result = Member::create($data);
    
            DB::commit();
            return $result;
        }

        catch(\Exception $e)
       {    
            echo $e;
            DB::rollBack();
       }
          
           
    }

    public function destroy(int|array $id)
    {
        $count = 0;
        if (!is_array($id)) {
            $member = Member::find($id);

            return $this->delete($member);
        }

        $members =  Member::whereIn('id', $id)->get();
        $members->each(function (Member $member) use (&$count) {
            if ($this->delete($member))
                $count++;
        });

        if (!$count)
            throw new BadRequestException(sprintf("Xóa không thành công %d sản phẩm", count($id)));

        return $count;
    }

    protected function delete(Member $member)
    {

        try {
            DB::beginTransaction();
            $result = false;
            $member->books->each->delete();
            $member->delete();
            $result = true;
            DB::commit();
            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
