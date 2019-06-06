var jsScript = [
	'jquery-1.11.0.min', 'modernizr-latest', 'html5', 'bootstrap.min', 'jquery-ui', 'jquery.selectBoxIt', 'jquery.jcarousel.min'
];
for (counter = 0; counter < jsScript.length; counter++) {
	document.write('<script type="text/javascript" charset="utf-8" src="public/js/vendor/' + jsScript[counter] + '.js"></script>');
}