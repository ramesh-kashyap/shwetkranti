<link rel="stylesheet" href="{{ asset('upnl/iziToast.min.css') }}">
<script src="{{ asset('upnl/iziToast.min.js') }}"></script>
<style>
  /* Base dark card */
  .iziToast {
    --toast-bg: #111418;
    --toast-fg: #e7eaee;
    --toast-muted: #9aa4b2;
    --toast-border: #1b2026;
    --toast-shadow: 0 10px 30px rgba(0,0,0,.45);

    background: var(--toast-bg) !important;
    color: var(--toast-fg) !important;
    border: 1px solid var(--toast-border) !important;
    border-radius: 14px !important;
    box-shadow: var(--toast-shadow) !important;
  }

  /* Text */
  .iziToast .iziToast-title{color:var(--toast-fg) !important;font-weight:600}
  .iziToast .iziToast-message{color:var(--toast-muted) !important}

  /* Button/close */
  .iziToast>.iziToast-close{filter: invert(1) opacity(.85)}

  /* Progress bar */
  .iziToast-progressbar>div{background: rgba(255,255,255,.35) !important}

  /* Icons (optional if using built-ins) */
  .iziToast-icon{filter: invert(1) opacity(.9)}

  /* Accents per type */
  .iziToast-success{
    box-shadow: 0 0 0 1px rgba(16,185,129,.25), var(--toast-shadow) !important;
  }
  .iziToast-success:before{background: linear-gradient(90deg,#10b981,#34d399) !important}

  .iziToast-error{
    box-shadow: 0 0 0 1px rgba(239,68,68,.25), var(--toast-shadow) !important;
  }
  .iziToast-error:before{background: linear-gradient(90deg,#ef4444,#f87171) !important}

  .iziToast-warning{
    box-shadow: 0 0 0 1px rgba(245,158,11,.25), var(--toast-shadow) !important;
  }
  .iziToast-warning:before{background: linear-gradient(90deg,#f59e0b,#fbbf24) !important}

  .iziToast-info{
    box-shadow: 0 0 0 1px rgba(59,130,246,.25), var(--toast-shadow) !important;
  }
  .iziToast-info:before{background: linear-gradient(90deg,#3b82f6,#60a5fa) !important}

  /* Compact on mobile */
  @media (max-width: 575.98px){
    .iziToast{border-radius:12px !important}
    .iziToast .iziToast-message{font-size:.9rem}
  }
</style>
@if(session()->has('notify'))
    @foreach(session('notify') as $msg)
        <script>
            "use strict";
            iziToast.{{ $msg[0] }}({message:"{{ __($msg[1]) }}", position: "topRight"});
        </script>
    @endforeach
@endif

@if ($errors->any())
    @php
        $collection = collect($errors->all());
        $errors = $collection->unique();
    @endphp

    <script>
        "use strict";
        @foreach ($errors as $error)
        iziToast.error({
            message: '{{ __($error) }}',
            position: "topRight"
        });
        @endforeach
    </script>

@endif
<script>
    "use strict";
    function notify(status,message) {
        iziToast[status]({
            message: message,
            position: "topRight"
        });
    }
</script>
