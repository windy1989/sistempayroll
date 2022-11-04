setTimeout(function () {
$('#my-signin3 div div span span:last').text("Masuk dengan Google");
$('#my-signin3 div div span span:first').text("Masuk dengan Google");
}, 500);

window.onLoadCallback = function() {
    gapi.load("auth2", function() {
        gapi.auth2.init().then(function() {
            var n = gapi.auth2.getAuthInstance();
            n.signOut().then(function() {}), n.disconnect()
        })
    })
};

function onMasuk(t) {
    var e = t.getBasicProfile(),
        n = t.getAuthResponse().id_token;
		
	Pace.restart();
	Pace.track(function () {
		
		$.ajax({
			method: "POST",
			url: "../admincrud/gauth",
			data: { email: e.getEmail(), token: n}
		}).done(function( t ) {
			
			if ("1" == t) {
				var e = gapi.auth2.getAuthInstance();
				e.signOut().then(function() {}), e.disconnect(), location.reload()
			} else var f = gapi.auth2.getAuthInstance();
			f.signOut().then(function() {}), f.disconnect(), swal({ title: "Maaf!", text: "Email tidak ditemukan!", type: "error" })
			
			Pace.stop();
		});
		
	});
}