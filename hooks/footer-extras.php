<?php if(!$_GET['Embedded']){ ?>
	<div class="alert alert-info navbar-fixed-bottom hidden-print">
		<div class="pull-left hidden-xs hidden-sm" style="max-width: 600px;">
			This is a demo application created using <a href="http://bigprof.com/appgini/">AppGini</a>.
			You can browse it anonymously (read-only access), or <a href="index.php?signIn=1">sign in</a>
			with username <i>demo</i> and password <i>demo</i> to be able to add records
			(you can edit only the records added by 'demo' but not other records.)
		</div>
		
		<span class="pull-right">
			Demo theme is set to <b id="demo-theme-name">Bootstrap</b><br>
			<button type="button" class="btn btn-warning btn-lg vspacer-md" id="demo-options"><i class="glyphicon glyphicon-cog"></i> Change theme</button>
		</span>
	</div>
	
	<script>
		$j(function(){
			/* get configured theme */
			var theme = cookie('theme');
			
			if(theme && theme.match(/.*?\.css$/)){
				/* remove default theme */
				$j('link[rel=stylesheet][href*="initializr/css/"]').remove();
				$j('link[rel=stylesheet][href="dynamic.css.php"]').remove();

				/* apply configured theme */
				$j('head').append('<link rel="stylesheet" href="resources/initializr/css/' + theme + '">');
				if(theme == 'bootstrap.css' && !$j('html').hasClass('lt-ie9')){
					$j('head').append('<link rel="stylesheet" href="resources/initializr/css/bootstrap-theme.css">');
				}
				$j('head').append('<link rel="stylesheet" href="dynamic.css.php">');
				
				/* update displayed theme name */
				$j('#demo-theme-name').html(ucfirst(theme.replace(/\.css$/, '')));
			}			
			
			$j('#demo-options').click(function(){
				modal_window({
					message: 'Theme <select id="demo-theme">' +
							'<option value="bootstrap.css">Bootstrap</option>' +
							'<option value="cerulean.css">Cerulean</option>' +
							'<option value="cosmo.css">Cosmo</option>' +
							'<option value="cyborg.css">Cyborg</option>' +
							'<option value="darkly.css">Darkly</option>' +
							'<option value="flatly.css">Flatly</option>' +
							'<option value="journal.css">Journal</option>' +
							'<option value="paper.css">Paper</option>' +
							'<option value="readable.css">Readable</option>' +
							'<option value="sandstone.css">Sandstone</option>' +
							'<option value="simplex.css">Simplex</option>' +
							'<option value="slate.css">Slate</option>' +
							'<option value="spacelab.css">Spacelab</option>' +
							'<option value="superhero.css">Superhero</option>' +
							'<option value="united.css">United</option>' +
							'<option value="yeti.css">Yeti</option>' +
						'</select>' +
						'<div class="vspacer-lg alert alert-info">Please note that, depending on your connection speed, some themes might take a few seconds to be fully load.</div>',
					title: 'Change the theme of the demo',
					footer: [{
						label: 'Apply',
						bs_class: 'success',
						click: function(){
							cookie('theme', $j('#demo-theme').val());
							location.reload();
						}
					}]
				});
				
				$j("select[id='demo-theme']").val(theme);
			});
		});
	</script>
<?php }else{ ?>
	<script>
		$j(function(){
			/* get configured theme */
			var theme = cookie('theme');
			
			if(theme && theme.match(/.*?\.css$/)){
				/* remove default theme */
				$j('link[rel=stylesheet][href*="initializr/css/"]').remove();
				$j('link[rel=stylesheet][href="dynamic.css.php"]').remove();

				/* apply configured theme */
				$j('head').append('<link rel="stylesheet" href="resources/initializr/css/' + theme + '">');
				if(theme == 'bootstrap.css' && !$j('html').hasClass('lt-ie9')){
					$j('head').append('<link rel="stylesheet" href="resources/initializr/css/bootstrap-theme.css">');
				}
				$j('head').append('<link rel="stylesheet" href="dynamic.css.php">');
			}
		});
	</script>
<?php } ?>

<script>
	function cookie(name, val){
		if(val !== undefined) createCookie(name, val, 0.1);
		return readCookie(name);
	}
	
	function ucfirst(str) {
		str += '';
		var f = str.charAt(0).toUpperCase();
		return f + str.substr(1);
	}

	function createCookie(name, value, days) {
		var expires;

		if (days) {
			var date = new Date();
			date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
			expires = "; expires=" + date.toGMTString();
		} else {
			expires = "";
		}
		document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
	}

	function readCookie(name) {
		var nameEQ = encodeURIComponent(name) + "=";
		var ca = document.cookie.split(';');
		for (var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) === ' ') c = c.substring(1, c.length);
			if (c.indexOf(nameEQ) === 0) return decodeURIComponent(c.substring(nameEQ.length, c.length));
		}
		return null;
	}

	function eraseCookie(name) {
		createCookie(name, "", -1);
	}
</script>