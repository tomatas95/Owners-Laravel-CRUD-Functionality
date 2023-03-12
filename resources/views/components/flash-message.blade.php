@if(Session::has('message'))
<div class="flash" x-data="{show: true}" x-init="setTimeout(() => show = false, 8000)" x-show="show"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform scale-90"
     x-transition:enter-end="opacity-100 transform scale-100"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="opacity-100 transform scale-100"
     x-transition:leave-end="opacity-0 transform scale-90"
     x-cloak>
  <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}   
    <button type="button" class="closebtn" x-on:click="show = false">&times;</button>
  </p>
</div>
@endif
