<?php

namespace Core\User;

use Railken\Laravel\Manager\Contracts\ModelSerializerContract;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\ModelSerializer;
use Railken\Laravel\Manager\Tokens;
use Illuminate\Support\Collection;
use Railken\Bag;
use Laravolt\Avatar\Avatar;
use Illuminate\Support\Facades\Storage;

class UserSerializer extends ModelSerializer
{

    /**
     * Serialize entity
     *
     * @param EntityContract $entity
     * @param Collection $select
     *
     * @return array
     */
    public function serialize(EntityContract $entity, Collection $select = null)
    {
        $bag = new Bag($entity->toArray());


        $bag->set('avatar', (new Avatar())->create($entity->username)->toBase64()->getEncoded());

        if ($select) {
            $bag = $bag->only($select->toArray());
        }



        // $bag = $bag->only($this->manager->authorizer->getAuthorizedAttributes(Tokens::PERMISSION_SHOW, $entity)->keys()->toArray());

        $entity->fileHealthCard && $bag->set('file_health_card_url',  env('APP_URL'). Storage::url($entity->fileHealthCard->path));
        $entity->fileDocFront   && $bag->set('file_doc_front_url',  env('APP_URL'). Storage::url($entity->fileDocFront->path));
        $entity->fileDocBack    && $bag->set('file_doc_back_url',  env('APP_URL'). Storage::url($entity->fileDocBack->path));
        $entity->fileAvatar     && $bag->set('file_avatar_url',  env('APP_URL'). Storage::url($entity->fileAvatar->path));
        return $bag;
    }
}
