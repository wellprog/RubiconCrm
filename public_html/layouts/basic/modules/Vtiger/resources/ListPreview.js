/* {[The file is published on the basis of YetiForce Public License 3.0 that can be found in the following directory: licenses/LicenseEN.txt or yetiforce.com]} */
Vtiger_List_Js("Vtiger_ListPreview_Js", {}, {
	frameProgress: false,
	updatePreview: function (url) {
		var frame = $('#listPreviewframe');
		this.frameProgress = $.progressIndicator({
			position: 'html',
			message: app.vtranslate('JS_FRAME_IN_PROGRESS'),
			blockInfo: {
				enabled: true
			}
		});
		var defaultView = '';
		if (app.getMainParams('defaultDetailViewName')) {
			defaultView = defaultView + '&mode=showDetailViewByMode&requestMode=' + app.getMainParams('defaultDetailViewName'); // full, summary
		}
		frame.attr('src', url.replace("view=Detail", "view=DetailPreview") + defaultView);
	},
	registerPreviewEvent: function () {
		var thisInstance = this;
		var iframe = $("#listPreviewframe");
		$("#listPreviewframe").load(function () {
			thisInstance.frameProgress.progressIndicator({mode: "hide"});
			iframe.height($(this).contents().find(".bodyContents").height() - 20);
		});
		$(".listViewEntriesTable .listViewEntries").first().trigger("click");
	},
	postLoadListViewRecordsEvents: function (container) {
		this._super(container);
		this.registerPreviewEvent();
	},
	registerRowClickEvent: function () {
		var thisInstance = this;
		var listViewContentDiv = this.getListViewContentContainer();
		listViewContentDiv.on('click', '.listViewEntries', function (e) {
			if ($(e.target).closest('div').hasClass('actions'))
				return;
			if ($(e.target).is('button') || $(e.target).parent().is('button'))
				return;
			if ($(e.target).closest('a').hasClass('noLinkBtn'))
				return;
			if ($(e.target, $(e.currentTarget)).is('td:first-child'))
				return;
			if ($(e.target).is('input[type="checkbox"]'))
				return;
			if ($.contains($(e.currentTarget).find('td:last-child').get(0), e.target))
				return;
			if ($.contains($(e.currentTarget).find('td:first-child').get(0), e.target))
				return;
			var elem = $(e.currentTarget);
			var recordUrl = elem.data('recordurl');
			if (typeof recordUrl == 'undefined') {
				return;
			}
			e.preventDefault();
			$('.listViewEntriesTable .listViewEntries').removeClass('active');
			$(this).addClass('active');
			thisInstance.updatePreview(recordUrl);
		});
	},
	updateListPreviewSize: function (currentElement) {
		var fixedList = $('.fixedListInitial, .fixedListContent');
		var vtFooter = $('.vtFooter').height();
		if ($(window).width() > 993) {
			var height = $(window).height() - (vtFooter + currentElement.offset().top + 2);
			fixedList.css('max-height', height);
		}
	},
	registerListPreviewScroll: function (container) {
		var thisInstance = this;
		var fixedList = container.find('.fixedListInitial');
		var listPreview = container.find('#listPreview');
		var mainBody = container.closest('.mainBody');
		var wrappedPanels = container.find('.wrappedPanel');
		var listViewEntriesDiv = container.find('.listViewEntriesDiv');
		var commActHeight = $('.commonActionsContainer').height();
		var paddingTop = 6;
		var offset = fixedList.offset().top - commActHeight - paddingTop;
		fixedList.find('.fixedListContent').perfectScrollbar();
		listViewEntriesDiv.perfectScrollbar();
		$(window).resize(function () {
			thisInstance.updateListPreviewSize(fixedList);
			if (mainBody.scrollTop() >= (fixedList.offset().top + commActHeight)) {
				container.find('.gutter').css('left', listPreview.offset().left - 8);
			}
		});
		mainBody.scroll(function () {
			var gutter = container.find('.gutter');
			var gutterHeight = {height: $(window).height() - (gutter.offset().top + 33)};
			gutter.css(gutterHeight);
			wrappedPanels.css(gutterHeight);
			if ($(this).scrollTop() >= (fixedList.offset().top + commActHeight - paddingTop)) {
				if (listPreview.height() + listPreview.offset().top + 33 > $(window).height()) {
					fixedList.css('top', $(this).scrollTop() - offset);
					if ($(window).width() > 993) {
						wrappedPanels.addClass('wrappedPanelOnScroll');
						gutter.addClass('gutterOnScroll');
						gutter.css('left', listPreview.offset().left - 8);
						gutter.on('mousedown', function () {
							$(this).on('mousemove', function (e) {
								$(this).css('left', listPreview.offset().left - 8);
							});
						});
					}
				}
			} else {
				fixedList.css('top', 'initial');
				if ($(window).width() > 993) {
					var gutter = container.find('.gutter');
					wrappedPanels.removeClass('wrappedPanelOnScroll');
					gutter.removeClass('gutterOnScroll');
					gutter.css('left', 0);
					gutter.off('mousedown');
					gutter.off('mousemove');
				}
			}
			thisInstance.updateListPreviewSize(fixedList);
		});
		thisInstance.updateListPreviewSize(fixedList);
	},
	registerSplit: function (container, fixedList, wrappedPanelLeft, wrappedPanelRight, commActHeight) {
		if ($(window).width() > 993) {
			var rightSplitMaxWidth = (400 / $(window).width()) * 100;
			var minWidth = (15 / $(window).width()) * 100;
			var maxWidth = 100 - minWidth;
			var thWidth = container.find('.listViewEntriesDiv .listViewHeaders th').first();
			thWidth = ((thWidth.width() + thWidth.next().width() + 62) / $(window).width()) * 100;
			var iframe = container.find('#listPreviewframe');
			var split = Split(['.fixedListInitial', '#listPreview'], {
				sizes: [thWidth, 100 - thWidth],
				minSize: 10,
				gutterSize: 8,
				snapOffset: 100,
				onDrag: function () {
					if (split.getSizes()[1] < rightSplitMaxWidth) {
						split.collapse(1);
					}
					if (split.getSizes()[0] < 5) {
						wrappedPanelLeft.addClass('wrappedPanelLeft');
					} else {
						wrappedPanelLeft.removeClass('wrappedPanelLeft');
					}
					if (split.getSizes()[1] < 10) {
						wrappedPanelRight.addClass('wrappedPanelRight');
						fixedList.width(fixedList.width() - 10);
					} else {
						wrappedPanelRight.removeClass('wrappedPanelRight');
					}
					if (iframe.contents().find('.gutter').length) {
						var relatedHeader = iframe.contents().find('.relatedHeader');
						var wrappedPanel = iframe.contents().find('.wrappedPanel');
						wrappedPanel.css('top', relatedHeader.height() + relatedHeader.position().top + 2);
					}
				}
			});
			var gutter = container.find('.gutter');
			var gutterHeight = {height: $(window).height() - (gutter.offset().top + commActHeight + 33)};
			gutter.css(gutterHeight);
			wrappedPanelLeft.css(gutterHeight);
			wrappedPanelRight.css(gutterHeight);
			gutter.on("dblclick", function () {
				if (split.getSizes()[0] < 25) {
					split.setSizes([25, 75]);
					wrappedPanelLeft.removeClass('wrappedPanelLeft');
				} else if (split.getSizes()[1] < 25) {
					split.setSizes([75, 25]);
					wrappedPanelRight.removeClass('wrappedPanelRight');
					gutter.css('right', 'initial');
					fixedList.css('padding-right', '10px');
				} else if (split.getSizes()[0] > 24 && split.getSizes()[0] < 50) {
					split.setSizes([minWidth, maxWidth]);
					wrappedPanelLeft.addClass('wrappedPanelLeft');
				} else if (split.getSizes()[1] > 10 && split.getSizes()[1] < 50) {
					split.collapse(1);
					wrappedPanelRight.addClass('wrappedPanelRight');
					fixedList.width(fixedList.width() - 10);
				}
			});
			wrappedPanelLeft.on("dblclick", function () {
				split.setSizes([25, 75]);
				wrappedPanelLeft.removeClass('wrappedPanelLeft');
			});
			wrappedPanelRight.on("dblclick", function () {
				split.setSizes([75, 25]);
				wrappedPanelRight.removeClass('wrappedPanelRight');
				gutter.css('right', 'initial');
				fixedList.css('padding-right', '10px');
			});
			return split;
		}
	},
	updateSplit: function (container) {
		var thisInstance = this;
		var fixedList = container.find('.fixedListInitial');
		var commActHeight = container.closest('.commonActionsContainer').height();
		var listPreview = container.find('#listPreview');
		var splitsArray = [];
		var mainBody = container.closest('.mainBody');
		var wrappedPanelLeft = $('.wrappedPanel')[0];
		wrappedPanelLeft = container.find(wrappedPanelLeft);
		var wrappedPanelRight = $('.wrappedPanel')[1];
		wrappedPanelRight = container.find(wrappedPanelRight);
		var split = thisInstance.registerSplit(container, fixedList, wrappedPanelLeft, wrappedPanelRight, commActHeight);
		var rotatedText = container.find('.rotatedText');
		rotatedText.first().find('.textCenter').append($('.breadcrumbsContainer .separator').nextAll().text());
		rotatedText.css({
			width: wrappedPanelLeft.height(),
			height: wrappedPanelLeft.height()
		});
		splitsArray.push(split);
		$(window).resize(function () {
			if ($(window).width() < 993) {
				if (container.find('.gutter').length) {
					splitsArray[splitsArray.length - 1].destroy();
					wrappedPanelRight.removeClass('wrappedPanelRight');
					wrappedPanelLeft.removeClass('wrappedPanelLeft');
				}
			} else {
				if (container.find('.gutter').length !== 1) {
					var newSplit = thisInstance.registerSplit(container, fixedList, wrappedPanelLeft, wrappedPanelRight, commActHeight);
					var gutter = container.find('.gutter');
					if (mainBody.scrollTop() >= (fixedList.offset().top + commActHeight)) {
						gutter.addClass('gutterOnScroll');
						gutter.css('left', listPreview.offset().left - 8);
						gutter.on('mousedown', function () {
							$(this).on('mousemove', function (e) {
								$(this).css('left', listPreview.offset().left - 8);
							});
						});
					}
					splitsArray.push(newSplit);
				}
				var currentSplit = splitsArray[splitsArray.length - 1];
				var minWidth = (15 / $(window).width()) * 100;
				var maxWidth = 100 - minWidth;
				if (currentSplit.getSizes()[0] < minWidth + 5) {
					currentSplit.setSizes([minWidth, maxWidth]);
				} else if (currentSplit.getSizes()[1] < minWidth + 5) {
					currentSplit.setSizes([maxWidth, minWidth]);
				}
			}
		});
	},
	registerEvents: function () {
		var listViewContainer = this.getListViewContentContainer();
		this._super();
		this.registerPreviewEvent();
		this.updateSplit(listViewContainer);
		this.registerListPreviewScroll(listViewContainer);
	},
});
