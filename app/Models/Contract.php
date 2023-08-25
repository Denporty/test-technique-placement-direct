<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Contract
 * @package App\Models
 * @property string title
 * @property string content
 * @property integer user_id
 * @property integer is_sign
 * @property mixed id
 */
class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'is_sign',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];


    /**
     * @param array $paramValidated
     * @param null $contractParam
     * @return Contract|null
     */
    public static function saveContract(array $paramValidated, $contractParam = null): ?Contract
    {
        if (!$contractParam) {
            $contract = new self();
        }else{
            $contract = $contractParam;
        }
        $contract->fill($paramValidated);
        $contract->save();
        return $contract;
    }

    /**
     * Get the section associated with the article.
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
