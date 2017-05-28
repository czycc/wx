var http = require('http').Server();
var socket = require('socket.io')(http);

socket.on('connection', function (socket) {
    console.log('a user connect');
    socket.on('disconnect', function () {
        console.log('a user disconnect');
    });
    socket.on('change', function (val) {
        console.log('msg:' + val);
        socket.broadcast.emit('g', {gt: 'val'});
    });
    socket.on('num', function (val) {
        console.log('msg:' + val);
        socket.broadcast.emit('s', {shark: +val});
    })
});

http.listen(3000, function () {
    console.log('success');
});