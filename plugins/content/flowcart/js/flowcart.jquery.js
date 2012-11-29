var fq      = jQuery.noConflict();

fq(document).ready(function(){

	// Hide flowcart standard pane
	var flowcartForm = fq('#flowcart-options').parent().find('.pane-slider.content').html();
	fq('#flowcart-options').parent().hide();

	var parent     = '#element-box';
	var content    = fq(parent + ' .m').html();

	// Navigation Tabs
	var tabs        = fq('<ul class="nav nav-tabs"></ul>');
	var articleTab  = fq('<li class="active"><a href="#tab-article" data-toggle="tab">Article</a></li>');
	var flowcartTab = fq('<li><a href="#tab-flowcart" data-toggle="tab">Flowcart</a></li>');
	tabs.append(articleTab);
	tabs.append(flowcartTab);

	// Content Tab Panes
	var newContent         = fq('<div class="tab-content"></div>');
	var articleTabContent  = fq('<div class="tab-pane active" id="tab-article">' + content + '</div>');
	var flowcartTabContent = fq('<div class="tab-pane" id="tab-flowcart">' + flowcartForm + '</div>');
	newContent.append(articleTabContent);
	newContent.append(flowcartTabContent);

	// Generate structure
	var container          = fq('<div class="flowcart tabbable"></div>');
	container.append(tabs);
	container.append(newContent);

	//fq('#element-box .m').remove();
	fq(parent + ' .m').html(container);

});
