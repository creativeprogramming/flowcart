function mootab(_nav, _body) {
	if (_nav) {
	    var tabs = _nav.getElements('> li');
	    var containers = _body.getElements('> li');

	    tabs.each(function(tab, index) {
	        tab.addEvents({
	            click: function(event) {
	                event.stop();

	                tabs.removeClass('active');
	                tabs[index].addClass('active');

	                containers.removeClass('active');
	                containers[index].addClass('active');
	            }
	        });
	    });
	}
}

window.addEvent('domready', function() {

	// Hide flowcart standard pane
	var flowcartForm = document.id('flowcart-options').getParent().getElement('.pane-slider.content').get('html');
	document.id('flowcart-options').getParent().setStyle('display','none');

	// Get standard content
	var parent = '#element-box';
	var container = document.getElement(parent + ' .m');
	var content = container.get('html');

	// Create navigation tabs
	var tabsNav = new Element('ul#flowtabs-nav');
	var articleTab  = new Element('li', {
		'class' : 'active',
		'html' :  '<a href="#tab-article" data-toggle="tab">Article</a>'
	});
	var flowcartTab = new Element('li', {
		'html' : '<a href="#tab-flowcart" data-toggle="tab" id="flowtab">flowcart</a>'
	});
	tabsNav.adopt(articleTab);
	tabsNav.adopt(flowcartTab);

	// Create content tabs
	var tabsBody = new Element('ul#flowtabs-body');
	var articleBody  = new Element('li', {
		'class' : 'active',
		'html' :  content
	});
	var flowcartBody  = new Element('li', {
		'html' : flowcartForm
	});
	tabsBody.adopt(articleBody);
	tabsBody.adopt(flowcartBody);

	// New page structure
	container.set('html', '');
	container.adopt(tabsNav).adopt(tabsBody);
	mootab($('flowtabs-nav'),$('flowtabs-body'));
});