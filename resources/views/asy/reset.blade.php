@extends('layouts.asy')
@section('content')

@endsection

@section('javascript')
  <script type="application/javascript">
      var socket = io('http://{{ Request::getHost() }}:3000');
      //开始游戏
      socket.emit('change', 'todefault');
  </script>
@endsection