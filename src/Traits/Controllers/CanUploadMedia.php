<?php namespace Ksoft\Klaravel\Traits;

use Illuminate\Http\Request;
use Spatie\MediaLibrary\Media;

/**
 * Trait CanUploadMedia.
 * ----------------
 * Routes
 * ----------------
 * Route::post('MODEL_PATH/{id}/media-upload', 'MODELController@upload')->name('MODEL_PATH.media.upload');
 * Route::get('MODEL_PATH/{id}/remove-media/{media?}', 'MODELController@remove')->name('MODEL_PATH.media.remove');
 * ----------------
 * VUE
 * ----------------
 * <file-upload-component
 *    :fotos="[]"
 *        :is-multiple="true"
 *        base-url="{{route($model_name.'.media.upload', $record->id)}}"
 *        record-id="{{$record->id}}">
 *    </file-upload-component>
 * props: ['fotos', 'recordId', 'baseUrl', 'isMultiple'],
 */
trait CanUploadMedia
{
    public function upload(Request $request, $id)
    {
        $record = $this->repo->find($id);
        $record->addMediaFromRequest('foto')->toMediaCollection('images');

        return $record->getMedia();
    }

    public function remove($id, Media $media)
    {
        $media->delete();
        return redirect(route($this->path.'.edit', $id).'#fotos')->with('flash_message', 'Media removed succesfully.');
    }
}
