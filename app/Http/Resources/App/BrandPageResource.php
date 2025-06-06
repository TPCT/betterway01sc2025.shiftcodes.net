<?php

namespace App\Http\Resources\App;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

class BrandPageResource extends JsonResource
{

    public function toArray($request)
    {
        $Client = auth('client')->user();
        if ($Client) {
            $ClientLanguage = LocalAppLanguage($Client->ClientAppLanguage);
            $BrandName = "BrandName" . $ClientLanguage;
            $BrandDesc = "BrandDesc" . $ClientLanguage;
            $BrandPolicy = "BrandPolicy" . $ClientLanguage;
        } else {
            $ClientLanguage = $request->ClientAppLanguage == 'ar' ? 'Ar' : 'En';
            $BrandName = "BrandName" . $ClientLanguage;
            $BrandDesc = "BrandDesc" . $ClientLanguage;
            $BrandPolicy = "BrandPolicy" . $ClientLanguage;
        }

        return [
            'IDBrand'             => $this->IDBrand,
            'BrandName'           => $this->$BrandName,
            'BrandDesc'           => ($this->$BrandDesc) ? $this->$BrandDesc : '',
            'BrandPolicy'         => ($this->$BrandPolicy) ? $this->$BrandPolicy : '',
            'BrandLogo'           => ($this->BrandLogo) ? asset($this->BrandLogo) : '',
            'BrandNumber'         => $this->BrandNumber,
            'BrandRating'         => $this->BrandRating,
            'Branches'            => $this->Branches,
            'SocialMedia'         => $this->BrandSocialMedia,
            'BrandProducts'       => $this->BrandProducts,
            'BrandGallery'        => $this->BrandGallery,
            'BrandReviews'        => $this->BrandReviews,
        ];
    }
}
