<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class Blog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
        'status',
        'image',
        'views',
        'publish_date',
    ];


    public static function upload($file, &$filePath)
    {
        $allowed = array('pdf', 'PDF', 'PNG', 'png', 'jpg', 'JPG', 'jpeg', 'JPEG');
        $fileName = $file['name'];
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) return false;

        $fileName = basename(date('Y-m-d') . rand(1000, 9999) . $file["name"]);
        $filePath = 'uploads/' . $fileName;

        $uploaded = move_uploaded_file($file["tmp_name"], $filePath);

        if (!$uploaded) return false;

        return true;
    }

    public static function newBlog($request, $file)
    {
        $filePath = '';
        if (self::upload($file, $filePath)) {
            return Blog::create([
                'image' => $filePath,
                'title' => $request->title,
                'content' => $request->content,
                'status' => $request->status,
                'publish_date' => $request->publish_date,
            ]);
        } else
            throw ValidationException::withMessages([
                'image' => ['invalid image'],
            ]);
    }

    public function updateBlog($request, $file)
    {
        $filePath = '';
        self::upload($file, $filePath);

        $this->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => ($filePath) ?? $this->image,
            'status' => $request->status,
            'publish_date' => $request->publish_date
        ]);
    }

    public function increaseView(){
        $this->update([
            'views' => ($this->views  + 1)
        ]);
    }
}
