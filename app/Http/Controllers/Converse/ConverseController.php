<?php

namespace App\Http\Controllers\Converse;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\File;

class ConverseController extends Controller
{
    public function image(Request $request)
    {
        $image = $request->image;
        $image = Image::make($image);
        $image->save(public_path('converse/upload/1.jpg'));
        $img_path = Storage::disk('public')->putFile('converse/upload', new File(public_path('converse/upload/1.jpg')));
        $qrcode = QrCode::format('png')->margin(0)->size(40)->generate(env('APP_URL') . '/' . $img_path);
        $image2 = Image::make($qrcode);
        $image = Image::make($img_path)->insert($image2, 'bottom-left', '20', '25');
        $image->save($img_path);
        return env('APP_URL') . '/' . $img_path;
    }

    public function cool(Request $request)
    {
        $this->validate($request, [
            'text1' => 'required',
            'text2' => 'required',
            'text3' => 'required'
        ]);
        //获取输入字段长度
        $length1 = $this->length($request->input('text1'));
        $length2 = $this->length($request->input('text2'));
        $length3 = $this->length($request->input('text3'));
        //用户头像 base64编码
        $avatar = Image::make($request->input('avatar'));
        //背景图片
        $img = Image::make(public_path('converse/img/cool.png'));
        //根据输入字段长度确定白底长度
        $img1 = Image::make(public_path('converse/img/coolSpace/' . $length1 . '.png'));
        $img2 = Image::make(public_path('converse/img/coolSpace/' . $length2 . '.png'));
        $img3 = Image::make(public_path('converse/img/coolSpace/' . $length3 . '.png'));
        //在白底上添加输入的文字
        $img1 = $img1->text($request->input('text1'), 0, 5, function ($font) {
            $font->file(public_path('converse/face/FZYTK.TTF'));
            $font->size(27);
            $font->align('left');
            $font->valign('top');
            $font->color('#183d8e');
        });
        $img2 = $img2->text($request->input('text2'), 0, 5, function ($font) {
            $font->file(public_path('converse/face/FZYTK.TTF'));
            $font->size(27);
            $font->align('left');
            $font->valign('top');
            $font->color('#183d8e');
        });
        $img3 = $img3->text($request->input('text3'), 0, 5, function ($font) {
            $font->file(public_path('converse/face/FZYTK.TTF'));
            $font->size(27);
            $font->align('left');
            $font->valign('top');
            $font->color('#183d8e');
        });
        //将白底插入到背景图
        $img = $img->insert($img1, '', 176, 673);
        $img = $img->insert($img2,'',310,711);
        $img = $img->insert($img3,'',190,909);
        $img = $img->insert($avatar,'',280,240);
        return $avatar->response('png');
    }

    public function hot(Request $request)
    {

    }

    protected function length($text)
    {
        $length = strlen(preg_replace("#[^\x{00}-\x{ff}]#u", '**', $text));
        $length = ceil($length / 2);
        return $length;


    }
}
