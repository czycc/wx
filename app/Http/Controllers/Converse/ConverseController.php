<?php

namespace App\Http\Controllers\Converse;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\File;
use EasyWeChat\Foundation\Application;


class ConverseController extends Controller
{
    public $js;

    /**
     * ConverseController constructor.
     * @param $app
     */
    public function __construct(Application $app)
    {
        $this->js = $app->js;
    }

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
        $avatar = Image::make($request->input('avatar'))->resize(64, 90);
        $mask = Image::make(public_path('converse/img/mask3.png'));
        $avatar = $avatar->mask($mask);
        //字数不同取不同的背景图片
//        if ($length1 > 4) {
//            if ($length2 > 4) {
//                if ($length3 > 6) {
//                    $img = Image::make(public_path('converse/img/cool/cool_lll.jpg'));
//                } else {
//                    $img = Image::make(public_path('converse/img/cool/cool_lls.jpg'));
//                }
//            } else {
//                if ($length3 > 6) {
//                    $img = Image::make(public_path('converse/img/cool/cool_lsl.jpg'));
//                } else {
//                    $img = Image::make(public_path('converse/img/cool/cool_lss.jpg'));
//                }
//            }
//        } else {
//            if ($length2 > 4) {
//                if ($length3 > 6) {
//                    $img = Image::make(public_path('converse/img/cool/cool_sll.jpg'));
//                } else {
//                    $img = Image::make(public_path('converse/img/cool/cool_sls.jpg'));
//                }
//            } else {
//                if ($length3 > 6) {
//                    $img = Image::make(public_path('converse/img/cool/cool_ssl.png'));
//                } else {
//                    $img = Image::make(public_path('converse/img/cool/cool_sss.png'));
//                }
//            }
//        }
        if ($length3 <= 2) {
            $img = Image::make(public_path('converse/img/cool-2/cool2.png'));
        } elseif($length3 <= 4 && $length3 > 2) {
            $img = Image::make(public_path('converse/img/cool-2/cool4.png'));
        } else{
            $img = Image::make(public_path('converse/img/cool-2/cool6.png'));
        }
        //根据输入字段长度确定白底长度
        $img1 = Image::make(public_path('converse/img/coolSpace/hot/' . $length1 . '.png'));
        $img2 = Image::make(public_path('converse/img/coolSpace/hot/' . $length2 . '.png'));
        $img3 = Image::make(public_path('converse/img/coolSpace/' . $length3 . '.png'));
        //在白底上添加输入的文字
        $img1 = $img1->text($request->input('text1'), 0, 5, function ($font) {
            $font->file(public_path('converse/face/FZYTK.TTF'));
            $font->size(25);
            $font->align('left');
            $font->valign('top');
            $font->color('#183d8e');
        });
        $img2 = $img2->text($request->input('text2'), 0, 5, function ($font) {
            $font->file(public_path('converse/face/FZYTK.TTF'));
            $font->size(25);
            $font->align('left');
            $font->valign('top');
            $font->color('#183d8e');
        });
        $img3 = $img3->text($request->input('text3'), 0, 5, function ($font) {
            $font->file(public_path('converse/face/FZYTK.TTF'));
            $font->size(25);
            $font->align('left');
            $font->valign('top');
            $font->color('#183d8e');
        });
        //将白底插入到背景图
        $img = $img->insert($img1, '', 176, 673);
        $img = $img->insert($img2, '', 287, 711);
        $img = $img->insert($img3, '', 190, 907);
        $img = $img->insert($avatar, '', 280, 240);
        //将图片保存到服务器
        $img->save(public_path('converse/upload/1.jpg'));
        $img_path = Storage::disk('public')->putFile('converse/upload', new File(public_path('converse/upload/1.jpg')));
        $img_url = env('APP_URL') . '/' . $img_path;

        $js = $this->js;
        return view('converse.poster', compact('img_url', 'js'));
//        return $img->response('png');
    }

    public function hot(Request $request)
    {
        //获取输入字段长度
        $length1 = $this->length($request->input('text1'));
        $length2 = $this->length($request->input('text2'));
        $length3 = $this->length($request->input('text3'));
        $length4 = $this->length($request->input('text4'));
        $length5 = $this->length($request->input('text5'));
        $length6 = $this->length($request->input('text6'));
        $length7 = $this->length($request->input('text7'));
        //用户头像 base64编码
        //背景图片，根据最后一个空格切换
        if ($length7 >= 4) {
            $img = Image::make(public_path('converse/img/hot-2/hot_l.jpg'));
        } else {
            $img = Image::make(public_path('converse/img/hot-2/hot_s.jpg'));
        }
        $avatar = Image::make($request->input('avatar'))->resize(64, 90);
        $mask = Image::make(public_path('converse/img/mask3.png'));
        $avatar = $avatar->mask($mask);
        //根据输入字段长度确定白底长度
        $img1 = Image::make(public_path('converse/img/coolSpace/' . $length1 . '.png'));
        $img2 = Image::make(public_path('converse/img/coolSpace/' . $length2 . '.png'));
        $img3 = Image::make(public_path('converse/img/coolSpace/hot2/' . $length3 . '.png'));
        //加逗号的白条
        $img4 = Image::make(public_path('converse/img/coolSpace/hot/' . $length4 . '.png'));
        $img5 = Image::make(public_path('converse/img/coolSpace/hot/' . $length5 . '.png'));

        $img6 = Image::make(public_path('converse/img/coolSpace/hot2/' . $length6 . '.png'));
        $img7 = Image::make(public_path('converse/img/coolSpace/' . $length7 . '.png'));
        //在白底上添加输入的文字
        $img1 = $img1->text($request->input('text1'), 0, 5, function ($font) {
            $font->file(public_path('converse/face/FZYTK.TTF'));
            $font->size(25);
            $font->align('left');
            $font->valign('top');
            $font->color('#183d8e');
        });
        $img2 = $img2->text($request->input('text2'), 0, 5, function ($font) {
            $font->file(public_path('converse/face/FZYTK.TTF'));
            $font->size(25);
            $font->align('left');
            $font->valign('top');
            $font->color('#183d8e');
        });
        $img3 = $img3->text($request->input('text3'), 0, 5, function ($font) {
            $font->file(public_path('converse/face/FZYTK.TTF'));
            $font->size(25);
            $font->align('left');
            $font->valign('top');
            $font->color('#183d8e');
        });
        $img4 = $img4->text($request->input('text4'), 0, 5, function ($font) {
            $font->file(public_path('converse/face/FZYTK.TTF'));
            $font->size(25);
            $font->align('left');
            $font->valign('top');
            $font->color('#183d8e');
        });
        $img5 = $img5->text($request->input('text5'), 0, 5, function ($font) {
            $font->file(public_path('converse/face/FZYTK.TTF'));
            $font->size(25);
            $font->align('left');
            $font->valign('top');
            $font->color('#183d8e');
        });
        $img6 = $img6->text($request->input('text6'), 0, 5, function ($font) {
            $font->file(public_path('converse/face/FZYTK.TTF'));
            $font->size(25);
            $font->align('left');
            $font->valign('top');
            $font->color('#183d8e');
        });
        $img7 = $img7->text($request->input('text7'), 0, 5, function ($font) {
            $font->file(public_path('converse/face/FZYTK.TTF'));
            $font->size(25);
            $font->align('left');
            $font->valign('top');
            $font->color('#183d8e');
        });
        //将白底插入到背景图
        $img = $img->insert($img1, '', 196, 656);
        $img = $img->insert($img2, '', 328, 656);
        $img = $img->insert($img3, '', 400, 656);
        $img = $img->insert($img4, '', 312, 690);
        $img = $img->insert($img5, '', 208, 721);
        $img = $img->insert($img6, '', 150, 787);
        $img = $img->insert($img7, '', 231, 912);

        $img = $img->insert($avatar, '', 280, 240);
        //将图片保存到服务器
        $img->save(public_path('converse/upload/1.jpg'));
        $img_path = Storage::disk('public')->putFile('converse/upload', new File(public_path('converse/upload/1.jpg')));
        $img_url = env('APP_URL') . '/' . $img_path;

        $js = $this->js;
        return view('converse.poster', compact('img_url', 'js'));
//        return $img->response('png');

    }

    protected function length($text)
    {
        $length = strlen(preg_replace("#[^\x{00}-\x{ff}]#u", '**', $text));
        $length = ceil($length / 2);
        return $length;
    }
}
