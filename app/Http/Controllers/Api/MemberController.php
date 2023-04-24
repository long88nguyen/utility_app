<?php

namespace App\Http\Controllers\Api;

use App\Filters\MemberFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Member\MemberResource;
use App\Models\Member;
use App\Services\MemberService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Member\MemberCreateRequest;


class MemberController extends Controller
{
    protected MemberService $memberService;

    public function __construct(MemberService $memberService)
    {
        return $this->memberService = $memberService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $members = Member::filter(new MemberFilter($request))->paginate($request->get('per_page',2));
        return  $this->respondWithResourceCollection(MemberResource::collection($members));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberCreateRequest $requestMember) : JsonResponse
    {
        
        $this->memberService->store($requestMember->all());
        return $this->respondSuccess('Thêm mới thành viên thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $members = $this->memberService->find($id);
        return $this->respondWithResource(new MemberResource($members));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ids = json_decode($id,true) ? : $id;  
        // dd([(int) $id]);
        // $ids = is_array($ids) ? $ids : [(int) $id];

        $count = $this->memberService->destroy($ids);
        $total = is_array($ids) ? count($ids) : 1;
        return $this->respondSuccess("Xóa thành công $count/$total sản phẩm");
    }
}
