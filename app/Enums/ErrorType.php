<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * ErrorType enum.
 */
class ErrorType extends BaseEnum
{

    const STATUS_200 = 200;
    // Error messages are defined in errors.php in /resources/lang/{lang} directory.
    // Invalid request
    // 不正なリクエストです

    const STATUS_500 = 500;

    const CODE_4000 = '4000';

    const STATUS_4000 = 400;

    // Authentication failed
    // 認証に失敗しました
    const CODE_4010 = '4010';

    const STATUS_4010 = 401;

    // Token has expired
    // 認証トークンの有効期限が切れています
    const CODE_4011 = '4011';

    const STATUS_4011 = 401;

    // email invite has expired
    // メール招待の有効期限が切れました
    const CODE_4014 = '4014';
    const STATUS_4014 = 401;

    // Token is invalid
    // 認証トークンが無効です
    const CODE_4012 = '4012';

    const STATUS_4012 = 401;

    // Token is already used
    // この認証トークンは使用済みです
    const CODE_4013 = '4013';

    const STATUS_4013 = 401;

    // Not authorized
    // 権限がありません
    const CODE_4030 = '4030';

    const STATUS_4030 = 403;

    // Access denied
    // アクセスは拒否されました
    const CODE_4031 = '4031';

    const STATUS_4031 = 403;

    // Blocked
    // ブロックされています
    const CODE_4032 = '4032';

    const STATUS_4032 = 403;

    // Data duplicate on unique column
    const CODE_4033 = '4033';

    const STATUS_4033 = 403;

    // No account
    // アカウントは存在しません
    const CODE_4040 = '4040';

    const STATUS_4040 = 404;

    // No data
    // データが存在しません
    const CODE_4041 = '4041';

    const STATUS_4041 = 404;

    // Not found
    const CODE_4043 = '4043';
    // Not found
    const STATUS_4043 = 404;

    // Not logged in
    // メールアドレスの認証には事前にログインが必要です。
    const CODE_4042 = '4042';

    const STATUS_4042 = 404;

    // Invalid HTTP method
    // HTTPメソッドが不正です
    const CODE_4050 = '4050';

    const STATUS_4050 = 405;

    // This process has been already executed
    // この操作はすでに実行されています
    const CODE_4090 = '4090';

    const STATUS_4090 = 409;

    //The account cannot be registered

    const CODE_4091 = '4091';

    const STATUS_4091 = 409;

    // Validation error
    // /resources/lang/ja/validation.php messages are used
    const CODE_4220 = '4220';

    const STATUS_4220 = 422;

    // Another user is operating
    // 他のユーザが操作中です
    const CODE_4230 = '4230';

    const STATUS_4230 = 423;

    // Year not not match
    const CODE_4240 = '4240';
    const STATUS_4240 = 422;

    // Company trip is registerred
    const CODE_4241 = '4241';
    const STATUS_4241 = 422;

    // Wheelled
    const CODE_4242 = '4242';
    const STATUS_4242 = 422;

    // System error
    // システムエラーが発生しました
    const CODE_5000 = '5000';

    const STATUS_5000 = 500;

    // Unexpected error
    // 予期せぬエラーが発生しました
    const CODE_5001 = '5001';

    const STATUS_5001 = 500;

    // DB error
    // DBエラーが発生しました
    const CODE_5002 = '5002';

    const STATUS_5002 = 500;

    // Registration failed
    // 登録に失敗しました
    const CODE_5003 = '5003';

    const STATUS_5003 = 500;

    // Update failed
    // 更新に失敗しました
    const CODE_5004 = '5004';

    const STATUS_5004 = 500;

    // Deletion failed
    // 削除に失敗しました
    const CODE_5005 = '5005';

    const STATUS_5005 = 500;

    // Settlement failed
    // 決済に失敗しました
    const CODE_5006 = '5006';

    const STATUS_5006 = 500;

    // Data has been changed by another user
    // 別のユーザーがデータを変更しました
    const CODE_5007 = '5007';

    const STATUS_5007 = 500;

    // Reset password
    const CODE_5008 = '5008';

    const STATUS_5008 = 500;

    // BusinessCard cannot be deleted
    const CODE_5009 = '5009';

    const STATUS_5009 = 500;

    // This admin user cannot be deleted because there is a valid contract
    // 有効な契約が存在するためこの管理ユーザーを削除することはできません
    const CODE_5010 = '5010';

    const STATUS_5010 = 500;

    // This user cannot scan mine QR
    const CODE_5011 = '5011';

    const STATUS_5011 = 500;

    // The QR code is invalid
    const CODE_5012 = '5012';

    const STATUS_5012 = 500;

    // Cannot delete business card while have a plan contract
    const CODE_5013 = '5013';

    const STATUS_5013 = 500;

    // password in correct
    const CODE_5014 = '5014';
    const STATUS_5014 = 500;

    // employee resignationed
    const CODE_4015 = '4015';
    const STATUS_4015 = 409;

    // employee over_time than hour allow
    const CODE_4016 = '4016';
    const STATUS_4016 = 422;

    // time sheet checkin/checkout -> Data already exists
    const CODE_4021 = '4021';
    const STATUS_4021 = 409;

    const CODE_5044 = '5044';
    const STATUS_5044 = 500;

    // time sabbatical less than 0.5
    const CODE_4009 = '4009';
    const STATUS_4009 = 409;

    // time sabbatical is registered
    const CODE_4069 = '4069';
    const STATUS_4069 = 409;

    // validate enabled create sabbtical request when submit

    const CODE_4070 = '4070';
    const STATUS_4070 = 409;

    // validate enabled create sabbtical request when submit

    const CODE_4071 = '4071';
    const STATUS_4071 = 409;

    // vadidate scope hour register ot
    const CODE_5069 = '5069';
    const STATUS_5069 = 500;

    // date overtime not data on timesheet
    const CODE_5070 = '5070';
    const STATUS_5070 = 500;

    // date overtime not data on timesheet
    const CODE_4291 = '4291';
    const STATUS_4291 = 429;

    // not found overtime request
    const CODE_4292 = '4292';

    // not found timesheet request
    const CODE_4293 = '4293';

    // not found sabbatical request
    const CODE_4294 = '4294';

    const CODE_4295 = '4295';
    const STATUS_4295 = 500;

    const CODE_4296 = '4296';
    const STATUS_4296 = 500;

    const CODE_4297 = '4297';
    const STATUS_4297 = 500;


    const CODE_4298 = '4298';
    const STATUS_4298 = 500;

    const CODE_4299 = '4299';
    const STATUS_4299 = 500;

    // user not allow review
    const CODE_5071 = '5071';
    const STATUS_5071 = 500;

    // user not exists
    const CODE_5072 = '5072';
    const STATUS_5072 = 500;

    // user not exists
    const CODE_5073 = '5073';
    const STATUS_5073 = 500;

    // user not exists
    const CODE_5074 = '5074';
    const STATUS_5074 = 500;

    // user not exists
    const CODE_5075 = '5075';
    const STATUS_5075 = 500;

    const CODE_4300 = '4300';
    const STATUS_4300 = 500;

    const CODE_5076 = '5076';
    const STATUS_5076 = 400;

    const CODE_4301 = '4301';
    const STATUS_4301 = 400;

    const CODE_4302 = '4302';
    const STATUS_4302 = 400;

    const CODE_4303 = '4303';
    const STATUS_4303 = 400;

    const CODE_4304 = '4304';
    const STATUS_4304 = 400;

    const CODE_4305 = '4305';
    const STATUS_4305 = 400;

    //Do you have an unapproved application?
    const CODE_4306 = '4306';
    const STATUS_4306 = 400;

    //remote request working
    const CODE_4307 = '4307';
    const STATUS_4307 = 409;

    const CODE_4308 = '4308';
    const STATUS_4308 = 409;
}