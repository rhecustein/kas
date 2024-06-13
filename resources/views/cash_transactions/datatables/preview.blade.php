<td>
	<img data-bs-toggle="modal" data-bs-target="#preview" class="object-cover preview" style="aspect-ratio: 1  !important;" src="{{is_null($model->image) ? asset('default.png') : asset('storage/previews/'.$model->image) }}" data-src="{{is_null($model->image) ? asset('default.png') : asset('storage/previews/'.$model->image) }}" width="140px" heigh="140px"/>
</td>

