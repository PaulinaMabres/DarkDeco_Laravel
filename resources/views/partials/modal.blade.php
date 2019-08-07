{{-- Card para alert y confirm --}}
<div class="message-card-container display-none">
  <div class="card message-card display-none">
    <div class="card-body message-card-body">
      Mensaje
    </div>
    <div class="card-footer message-card-footer product-card-footer">
      <div class="">
        <button id="btn-accept" class="btn btn-secondary" type="button" name="btn-accept" onclick="">Aceptar</button>
        <button id="btn-cancel" class="btn btn-secondary" type="button" name="btn-cancel" onclick="$('.message-card').fadeToggle();$('.message-card-container').fadeToggle();">Cancelar</button>
      </div>
    </div>
  </div>
</div>
