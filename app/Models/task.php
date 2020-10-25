<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
  use HasFactory;
  /**
  * 状態定義
  */
  const STATUS = [
    1 => [ 'label' => '未着手', 'class' => 'label-danger' ],
    2 => [ 'label' => '着手中', 'class' => 'label-info' ],
    3 => [ 'label' => '完了', 'class' => '' ],
  ];
  /**
  * 状態のラベル
  * @return string
  */

  // 状態を文字で返す
  public function getStatusLabelAttribute()
    {
      // 状態値
      $status = $this->attributes['status'];

      // 定義されていなければ空文字を返す
      if (!isset(self::STATUS[$status])) {
        return '';
      }

      return self::STATUS[$status]['label'];
    }

  // 文字の色を変える
  public function getStatusClassAttribute()
    {
      // 状態値
      $status = $this->attributes['status'];

      // 定義されていなければ空文字を返す
      if (!isset(self::STATUS[$status])) {
        return '';
      }

      return self::STATUS[$status]['class'];
    }

  // 日付の表示変更
  public function getFormattedDueDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])
            ->format('Y/m/d');
    }

}
