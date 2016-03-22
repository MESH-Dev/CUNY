/* Copyright Cubell Themes - Fotomag 1.2.1 */
/* globals jQuery, fotomagScripts, YT */
(function($) { "use strict";

    var cbToTop = $('#cb-to-top'),
        cbWindow = $(window),
        cbDoc = $(document),
        cbWindowHeight = cbWindow.height() + 1,
        cbWindowWidth = cbWindow.width(),
        cbBody = $('body'),
        cbModalClose = $('.cb-modal-closer'),
        cbHeader = $('#cb-header'),
        cbHeaderHeight = cbHeader.outerHeight(),
        cbHTMLBody = $('html, body'),
        cbMobileTablet = false,
        cbCheckerI = false,
        cbAdminBar = false,
        cbBodyRTL = false,
        cbMenuCloser = $('#cb-menu-closer'),
        cbSubCloser = $('#cb-sub-closer'),
        cbBGCloseTrigger = $('#cb-overlay').add(cbMenuCloser).add(cbSubCloser),
        cbSearchTrigger = $('#cb-search-trigger'),
        cbMenuTrigger = $('#cb-menu-trigger'),
        cbSubTrigger = $('#cb-sub-trigger'),
        cbCodes = [9, 13, 16, 17, 18, 20, 32, 45, 116],
        cbMSearch = $('#cb-search-overlay'),
        cbMSearchI = cbMSearch.find('.cb-search-field'),
        cbResults = cbMSearch.find("#cb-s-results"),
        cbTimer = 0,
        cbGallery = $('#cb-fis-gallery'),
        cbEmbedIcon = $('#cb-embed-icon-trigger'),
        cbEmbedIconData = cbEmbedIcon.data('cb-pid'),
        cbNavLeft = $('#cb-nav-left'),
        cbNavRight = $('#cb-nav-right'),
        cbTipBot = $('.cb-tip-bot'),
        cbTipRight = $('.cb-tip-right'),
        cbSlideInNav = $('#cb-slide-in-nav'),
        cbSlideInNavTL = cbSlideInNav.find('> .menu-item-has-children'),
        cbEntryContent = $('#cb-entry-content'),
        cbIframes = cbEntryContent.find('iframe'),
        cbImagesAlignNone = cbEntryContent.find('.alignnone'),
        cbVerticalNavDown = $('#cb-vertical-down'),
        cbFooter = $('#cb-footer'),
        cbFooterOffsetTop,
        cbFisWrap = $('#cb-fis-wrap'),
        cbFis = $('#cb-fis'),
        cbReadProgress = $('#cb-read-progress'),
        cbHideBars = $('.cb-hide-bars'),
        cbReadProgressValue = $('#cb-progress-value'),
        cbFISImg = cbFis.find('.cb-fis-bg'),
        cbLks = $('#cb-likes'),
        fotomagAlNonce = cbLks.attr('data-cb-nonce'),
        cbDate = new Date(),
        cbAjaxChecker = false,
        _gaq = _gaq || [],
        cbVar = 0,
        fotomagCounter = 0,
        cbData, cbPagi, cbCurrentPagination, cbEmbedIconDataAL, cbALurl, cbCurrentParent, cbThis, cbThisParent, cbBottomPostContent, cbBottomPostContentAndTop, cbProgress, cbEntryContentOffsetTop, cbWindowScrollTop, cbFlag, cbGalleryPostArrows;

    if ( ( cbBody.hasClass('cb-body-tabl') ) || ( cbBody.hasClass('cb-body-mob') ) ) { 
        cbMobileTablet = true; 
    }

    if ( cbFooter.length ) {
        cbFooterOffsetTop = cbFooter.offset().top;
    }

    cbFISImg.imagesLoaded( { background: true }, function() {
      cbFISImg.addClass('cb-fis-bg-ldd');
    });

    if ( cbFisWrap.length ) {
        if ( cbFis.hasClass('cb-style-1') ) {
            cbFisWrap.css( 'height', ( cbWindowHeight - cbHeaderHeight ) );
            cbFis.css( 'height', cbWindowHeight );
        } else if ( cbFis.hasClass('cb-style-2') ) {
            cbFisWrap.css( 'height', Math.round( ( cbWindowHeight - cbHeaderHeight ) / 1.4 ) );
        }
    }

    if ( cbEntryContent.length ) {
        cbEntryContentOffsetTop = cbEntryContent.offset().top;

        cbIframes.each( function() {
            $(this).wrap('<div class="cb-embed-wrap"</div>');
        });
    }
    if ( cbBody.hasClass('rtl') ) { cbBodyRTL = true; }
    if ( cbBody.hasClass('admin-bar') ) { cbAdminBar = true; }

    cbDoc.on('click', '#cb-blog-infinite-load a', function( event ){
        
        event.preventDefault();

        if ( cbAjaxChecker === true ) {
            return;
        }
        cbAjaxChecker = true;

        cbCurrentPagination = $(this).attr( 'href' );
        cbCurrentParent = $(this).parent();
        cbBody.addClass('cb-il-loading');

        $.get( cbCurrentPagination, function( data ) {
            
            cbData = $(data).find('#cb-main');
            cbPagi = $(data).find('#cb-blog-infinite-load');
            if ( cbBody.hasClass('cb-body-bs-2') ) {
                cbData.find('.cb-m').removeClass('cb-m').addClass('cb-s');
                cbData = cbData.children();
            } else {
                cbData = cbData.children();
            }

            $('#cb-main').append(cbData);
            $('#cb-main').after(cbPagi);
            cbCurrentParent.remove();
            if ( typeof _gaq !== 'undefined' && _gaq !== null ) {
                _gaq.push(['_trackPageview', cbCurrentPagination]);
            }
            window.history.pushState('', '', cbCurrentPagination);
            cbBody.removeClass('cb-il-loading');
            cbAjaxChecker = false;

        });

    });

    cbLks.click( function( e ) {

        e.preventDefault();

        if ( $(this).hasClass('cb-lkd') ) {
            return;
        }
        
        $.ajax({
            type : "POST",
            data : { action: 'fotomag_a_l', fotomagAlNonce: fotomagAlNonce, fotomagPostId: fotomagScripts.fotomagPostId },
            url: fotomagScripts.fotomagUrl,
            dataType:"json",
            beforeSend : function() {
                cbLks.addClass('cb-loading');
            },
            success : function( data ) {

                cbDate.setDate( cbDate.getDate() + 1 );
                document.cookie = 'article_liked' + '=' + 'true' + ';expires=' + cbDate.toUTCString();  

                if ( ( data !== '-1' ) && ( data !=='null' ) ) {
                    $('#cb-likes-int').html( data );
                }
                cbLks.addClass('cb-lkd');
                cbLks.removeClass('cb-lkd-0');
            },
            error : function(jqXHR, textStatus, errorThrown) {
                console.log("fotomag_Al_ " + jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    });

    cbVerticalNavDown.click( function( e ) {

        e.preventDefault();

        if ( cbEntryContent.length ) {
            cbHTMLBody.animate({ scrollTop: ( cbEntryContentOffsetTop + 1 ) }, 1200);
        }

        
        
    });

    cbModalClose.click( function( e ) {
        e.preventDefault();
    });


    function cbOnScroll() {

         if ( cbAdminBar === true ) {
            if ( cbWindowWidth > 781 ) {
                cbWindowScrollTop = cbWindow.scrollTop() + 32;
            } else {
                cbWindowScrollTop = cbWindow.scrollTop() + 46;
            }
        } else {
            cbWindowScrollTop = cbWindow.scrollTop();
        }

        cbChecker();

    }

    function cbChecker() {
        
        if ( ! cbCheckerI ) {
            requestAnimationFrame(cbScrolls);
            cbCheckerI = true;
        }
    }

    function cbScrolls() {

        if ( cbWindowWidth > 767 ) {

            if ( cbFooter.visible(true) ) {
                cbBody.addClass('cb-sides-freeze');
                cbNavLeft.css({ 'top': (cbFooter.offset().top - cbWindowHeight) });
                cbNavRight.css({ 'top': (cbFooter.offset().top - cbWindowHeight) });
            } else {
                cbBody.removeClass('cb-sides-freeze');
                cbNavRight.css({ 'top': '0' });
                cbNavLeft.css({ 'top': '0' });
            }

        } else {

            if ( cbFisWrap.length ) {

                if ( cbWindowScrollTop > cbEntryContentOffsetTop ) {
                    cbBody.addClass('cb-mob-freeze');
                } else {
                    cbBody.removeClass('cb-mob-freeze');
                }

            } else {
                
                if ( cbWindowScrollTop > cbHeaderHeight ) {
                    cbBody.addClass('cb-mob-freeze');
                } else {
                    cbBody.removeClass('cb-mob-freeze');
                }
            }
        }

        if ( ( cbBody.hasClass('single') ) || ( cbBody.hasClass('page') ) ) {

            if ( ( ( cbNavLeft.length ) || ( cbNavRight.length ) ) )  {

                if ( ( cbWindowWidth > 767 ) && ( cbHideBars.length ) && ( ! cbFooter.visible(true) )  ) {

                    cbHideBars.each(function(){
                        
                        if ( $(this).visible(true) ) {
                            cbFlag = true;
                        }

                    });

                    if ( cbFlag === true ) {
                        cbBody.removeClass('cb-show-sides'); 
                    } else {
                        cbBody.addClass('cb-show-sides'); 
                    } 

                    cbFlag = false;
                    
                } else {
                    cbBody.addClass('cb-show-sides');
                } 
                  
            } else {
                cbBody.removeClass('cb-show-sides');
            }
        }

        if ( ( cbFISImg.length !== 0 ) && ( cbFis.hasClass('cb-style-1') ) ) {

            if ( cbWindowScrollTop <  cbWindowHeight ) {
                cbBody.removeClass('cb-par-hidden');
                if ( cbAdminBar === true) {
                    cbWindowScrollTop = cbWindowScrollTop - 32;
                }

                var cbyPos = ( ( cbWindowScrollTop / 2    ) ),
                    cbCoords = cbyPos + 'px';

                    cbFISImg.css({ '-webkit-transform': 'translate3d(0, ' + cbCoords + ', 0)', 'transform': 'translate3d(0, ' + cbCoords + ', 0)' });
            } else {
                cbBody.addClass('cb-par-hidden');
            }

        }

        if ( cbReadProgress.length ) {

            cbBottomPostContent = cbEntryContent.height();
            cbBottomPostContentAndTop = cbEntryContentOffsetTop * 2 + cbBottomPostContent;
            cbProgress = parseFloat( 100 - ( cbWindowScrollTop - cbEntryContentOffsetTop ) / ( cbBottomPostContentAndTop - ( cbEntryContentOffsetTop * 2 ) ) * 100 ).toFixed(2);
            
            cbMoveProgress( cbProgress );
        }

        cbCheckerI = false;
    }


    window.addEventListener( 'scroll', cbOnScroll, false );


    function cbMoveProgress( element ) {
        if ( ( element < 0 ) || ( element > 100 )) {
          cbBody.removeClass('cb-read-live');
        } else {
            if ( cbReadProgressValue.length ) {
                cbReadProgressValue.text( 100 - Math.round( element ) + '%' );
            }
            cbReadProgress.find('.cb-bar').css({ '-webkit-transform': 'translateX(-' + element + '%)', 'transform': 'translateX(-' + element + '%)' });
            cbBody.addClass('cb-read-live');
        }
    }

    function cbAL() {

        $.ajax({
            method : "GET",
            data : { action: 'fotomag_al_l', fotomagALlNonce: fotomagScripts.fotomagALlNonce, fotomagPostId: fotomagScripts.fotomagPostId, fotomagCounter: fotomagCounter },
            url: fotomagScripts.fotomagUrl,
            beforeSend : function(){
            },
            success : function(data){
               
                $('#cb-main').append(data);
                $('#cb-al-post-' + fotomagCounter).addClass('cb-loaded');
                $('#cb-al').removeClass('cb-running').appendTo('#cb-al-post-' + fotomagCounter + ' #cb-entry-content');
                cbMakeImgs( $('#cb-al-post-' + fotomagCounter + ' #cb-entry-content .alignnone') );
                cbHideBars = cbHideBars.add( $('#cb-al-post-' + fotomagCounter + ' #cb-fis-wrap.cb-hide-bars') );
            
                if ( $('#cb-al-post-' + fotomagCounter + ' #cb-fis-gallery' ).length ) {
                    $('#cb-al-post-' + fotomagCounter + ' #cb-fis-gallery' ).slick({
                        variableWidth: true,
                        centerMode: false,
                        prevArrow: '<i class="fa cb-slider-arrow cb-slider-arrow-p fa-angle-left"></i>',
                        nextArrow: '<i class="fa cb-slider-arrow cb-slider-arrow-n fa-angle-right"></i>',
                    });
                    $('#cb-al-post-' + fotomagCounter + ' #cb-fis-gallery' ).find('.slick-track').children().addClass('cb-slider-ldd').removeClass('cb-slider-hidden');

                }

                $('#cb-al-post-' + fotomagCounter + ' #cb-fis').on('click', '.cb-embed-icon', function( e ) {
                    e.preventDefault();
                    cbEmbedIconDataAL = $(this).data('cb-pid');
                    $('#cb-media-trigger-' + cbEmbedIconDataAL).addClass('cb-active');
                    cbBody.addClass('cb-pf-modal-on');
                    
                });

                cbEntryContent = $('#cb-al-post-' + fotomagCounter + ' #cb-entry-content');
                cbALurl = $('#cb-al-post-' + fotomagCounter ).data('cb-purl');
                cbEntryContentOffsetTop = $('#cb-al-post-' + fotomagCounter + ' #cb-entry-content').offset().top;

                scene = new ScrollMagic.Scene({triggerElement: ".cb-al-post", triggerHook: "onEnter"})
                        .addTo(controller)
                        .on("enter", function (e) {

                        });
                if ( typeof _gaq !== 'undefined' && _gaq !== null ) {
                    _gaq.push(['_trackPageview', cbALurl]);
                }
                window.history.pushState('', '', cbALurl);

                fotomagCounter++;

            },
            error : function(jqXHR, textStatus, errorThrown) {
                console.log("cbsa " + jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    }

    if ( $('#cb-al').length ) {
        var controller = new ScrollMagic.Controller(),
            scene = new ScrollMagic.Scene({triggerElement: "#cb-al", triggerHook: "onEnter", offset: -500 })
                        .addTo(controller)
                        .on("enter", function (e) {
                            if ( ! $("#cb-al").hasClass("cb-running") ) {
                                $("#cb-al").addClass("cb-running");
                                cbAL();
                            }
                        });
    }





    cbMenuTrigger.click( function(e) {
        e.preventDefault();
        cbBody.addClass('cb-m-modal-on');
    });

    cbSubTrigger.click( function(e) {
        e.preventDefault();
        cbBody.addClass('cb-sub-modal-on');
    });

    cbSearchTrigger.click( function(e) {
        e.preventDefault();
        cbBody.addClass('cb-s-modal-on');
        if ( cbMobileTablet === false ) { 
            setTimeout(function(){ cbMSearchI.focus(); }, 50 );
        }

    });

    if ( cbSlideInNavTL.length ) {
        cbSlideInNavTL.find('.sub-menu').prepend('<li class="cb-menu-back"><a href="#"><i class="fa fa-arrow-left"></i></a></li>');
    }

    
    cbDoc.on('click', '.menu-item-has-children > a', function( e ) {
        e.preventDefault();
        cbThis = $(this);
        cbThisParent = cbThis.parent();
        cbThisParent.addClass('cb-selected');
        cbVar += 100;

        cbSlideInNav.css({ '-webkit-transform': 'translate3d(-' + cbVar + '%, -50%, 0)', 'transform': 'translate3d(-' + cbVar + '%, -50%, 0)'  });
    });

    cbDoc.on('click', '.cb-menu-back', function( e ){
        e.preventDefault();
        cbThis = $(this);
        cbThisParent = cbThis.parent().parent();
        cbThisParent.removeClass('cb-selected');
        cbVar -= 100;
        cbSlideInNav.css({ '-webkit-transform': 'translate3d(-' + cbVar + '%, -50%, 0)', 'transform': 'translate3d(-' + cbVar + '%, -50%, 0)'  });

    });

    cbMSearchI.keyup(function( e ) {

        if ( cbTimer ) {
            clearTimeout(cbTimer);
        }

        if ( e.keyCode == 27 ) { 
            cbTurnOffSearch();
            cbTurnOffMenu();
        } else if ( $.inArray( e.keyCode, cbCodes ) == -1 ) {
            cbTimer = setTimeout( cbSa, 300 ); 
        }
        
    });
   
    function cbSa() {

        var cbThisValue = cbMSearchI.val();
        if ( cbThisValue.length === 0 ) cbResults.empty();
        if ( cbThisValue.length < 3 ) {
            cbMSearchI.removeClass('cb-slide-up');
            return;
        }
        $.ajax({
            method : "GET",
            data : { action: 'fotomag_s_a', fotomagI: cbThisValue },
            url: fotomagScripts.fotomagUrl,
            beforeSend : function(){
                cbResults.removeClass('cb-slide-down');
                cbMSearch.addClass('cb-loading');
            },
            success : function(data){
                cbMSearch.addClass('cb-padded');
                cbResults.html( $(data) );
                cbResults.addClass('cb-slide-down');
                cbMSearchI.addClass('cb-slide-up');

            },
            error : function(jqXHR, textStatus, errorThrown) {
                console.log("cbsa " + jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    }

    function cbTurnOffSearch() {
        cbBody.removeClass('cb-s-modal-on');
    }

    function cbTurnOffMenu() {
        cbBody.removeClass('cb-m-modal-on');
    }

    function cbTurnOffSub() {
        cbBody.removeClass('cb-sub-modal-on');
    }


    function cbTurnOffPF() {
        cbBody.removeClass('cb-pf-modal-on');
        $('[id^="cb-media-trigger-"').removeClass('cb-active');
    }

    cbDoc.keyup(function(e) {

        if (e.keyCode == 27) { 
            cbTurnOffSearch();
            cbTurnOffMenu();
            cbTurnOffPF();
            cbTurnOffSub();
        }   
    });

    cbBGCloseTrigger.click( function() {
        cbTurnOffSearch();
        cbTurnOffMenu();
        cbTurnOffPF();
        cbTurnOffSub();
        cbPauseYTVideo();
    });

    cbMenuCloser.add(cbSubCloser).click( function( e ) {
        e.preventDefault();
    });


    cbToTop.click( function( e ) {

        e.preventDefault();
        cbHTMLBody.animate( {scrollTop: 0 }, 1500 );

    });

    cbEmbedIcon.click( function( e ) {

        e.preventDefault();
        cbBody.addClass('cb-pf-modal-on');
        $('#cb-media-trigger-' + cbEmbedIconData).addClass('cb-active');
        cbPlayYTVideo();

    });

    function cbMakeImgs( cbElement ) {
        if ( cbBody.hasClass( 'cb-fw-embeds' ) ) {
            
            if ( cbElement.hasClass('wp-caption') ) {
                var cbElementImg = cbElement.find('img');

                if  ( cbElementImg.hasClass( 'size-full' ) ) {
                    cbElement.addClass('cb-hide-bars cb-fs-img');
                    cbElementImg.addClass('cb-vw-img');
                    cbHideBars = cbHideBars.add(cbElement);
                    if ( cbBodyRTL === true ) {
                        cbElement.css( { 'margin-right': ( ( cbEntryContent.width() / 2 ) - ( cbWindowWidth / 2 ) ), 'max-width': 'none' }).addClass('cb-fs-embed');
                    } else {
                        cbElement.css( { 'margin-left': ( ( cbEntryContent.width() / 2 ) - ( cbWindowWidth / 2 ) ), 'max-width': 'none' }).addClass('cb-fs-embed');
                    }

                    cbElement.add(cbElementImg).css( 'width', cbWindowWidth );
                }

            } else if ( cbElement.hasClass( 'size-full' ) ) {
                cbElement.addClass('cb-hide-bars cb-fs-img cb-vw-img');
                cbHideBars = cbHideBars.add(cbElement);
                if ( cbBodyRTL === true ) {
                    cbElement.css( { 'margin-right': ( ( cbEntryContent.width() / 2 ) - ( cbWindowWidth / 2 ) ), 'max-width': 'none', 'width': cbWindowWidth });
                } else {
                    cbElement.css( { 'margin-left': ( ( cbEntryContent.width() / 2 ) - ( cbWindowWidth / 2 ) ), 'max-width': 'none', 'width': cbWindowWidth });
                }

            }
        }
    }


    if ( cbBody.hasClass( 'cb-fw-embeds' ) ) {
        cbImagesAlignNone.each( function() {
            cbMakeImgs($(this));          
        });
    }

    cbDoc.ready(function($) {

        cbChecker();

        if ( cbFooter.length ) {
            cbFooterOffsetTop = cbFooter.offset().top;
        }
        
        if ( cbEntryContent.length ) {
            cbEntryContentOffsetTop = cbEntryContent.offset().top;
            cbBottomPostContent = cbEntryContent.height();
            cbBottomPostContentAndTop = cbWindowHeight * 2 + cbBottomPostContent; var cbEntryContentOffsetTop = cbEntryContent.offset().top;
        }
        
        cbGallery.slick({
            variableWidth: true,
            centerMode: true,
            prevArrow: '<i class="fa cb-slider-arrow cb-slider-arrow-p fa-angle-left"></i>',
            nextArrow: '<i class="fa cb-slider-arrow cb-slider-arrow-n fa-angle-right"></i>',
        });

        cbGallery.on('swipe', function(event, slick, currentSlide, nextSlide){
            cbBody.addClass('cb-arrows-hover');
        });

        cbGalleryPostArrows = cbGallery.find('.cb-slider-arrow');       

        cbGalleryPostArrows.on({
            mouseenter: function () {
                cbBody.addClass('cb-arrows-hover');
            },
            mouseleave: function () {
                cbBody.removeClass('cb-arrows-hover');
            }
        });

        if ( cbGallery.length ) {
            cbEntryContent.click( function( e ) {

                cbBody.removeClass('cb-arrows-hover');

            });
        }
        
        if ( cbWindowWidth > 767 ) {
            cbTipBot.tooltip({
                direction: "bottom"
            });

            if ( cbBodyRTL === false ) {
                cbTipRight.tooltip({
                    direction: "right"
                });
            } else {
                cbTipRight.tooltip({
                    direction: "left"
                });
            }
        }

        cbDoc.ajaxStop(function() {
            $('.cb-loading').removeClass('cb-loading');
        });

        cbHTMLBody.on( 'mousewheel DOMMouseScroll', function() {
            cbHTMLBody.stop();
        });

        cbEntryContent.find('a').has('img').each(function () {

            var cbImgTitle = $('img', this).attr( 'title' ),
                cbAttr = $(this).attr('href');

            var cbWooLightbox = $(this).attr('rel');

            if (typeof cbImgTitle !== 'undefined') {
                $(this).attr('title', cbImgTitle);
            }

            if ( ( typeof cbAttr !== 'undefined' )  && ( cbWooLightbox !== 'prettyPhoto[product-gallery]' ) ) {
                var cbHref = cbAttr.split('.');
                var cbHrefExt = $(cbHref)[$(cbHref).length - 1];

                if ((cbHrefExt === 'jpg') || (cbHrefExt === 'jpeg') || (cbHrefExt === 'png') || (cbHrefExt === 'gif') || (cbHrefExt === 'tif')) {
                    $(this).addClass('cb-lightbox');
                }
            }

        });
        
        $('.tiled-gallery, .gallery').find('a').attr('data-lightbox-gallery', 'tiledGallery');

         if ( !!$.prototype.lightbox ) {
            $(".cb-lightbox").lightbox({ fixed: true }); 
        }

    });

    cbWindow.load(function() {

        cbGallery.find('.slick-track').children().addClass('cb-slider-ldd').removeClass('cb-slider-hidden');
    });

    cbWindow.resize(function() {

        cbWindowHeight = cbWindow.height() + 1;
        cbWindowWidth = cbWindow.width();
        cbHeaderHeight = cbHeader.outerHeight();

         if ( cbEntryContent.length ) {
            cbEntryContentOffsetTop = cbEntryContent.offset().top;
        }

        if ( cbWindowWidth < 767 ) {
            cbNavRight.css({ 'top': '' }).removeAttr( 'style' );
            cbNavLeft.css({ 'top': '' }).removeAttr( 'style' );
        }
        
    
        if ( cbFisWrap.length ) {
            if ( cbFis.hasClass('cb-style-1') ) {
                cbFisWrap.css( 'height', ( cbWindowHeight - cbHeaderHeight ) );
                cbFis.css( 'height', cbWindowHeight );
            } else if ( cbFis.hasClass('cb-style-2') ) {
                cbFisWrap.css( 'height', Math.round( ( cbWindowHeight - cbHeaderHeight ) / 1.4 ) );
            }
        }

        cbImagesAlignNone.each( function() {
            cbMakeImgs($(this));          
        });

    });

    var CbYTPlayerCheck = $('#cb-yt-player-' + cbEmbedIconData);

    function cbPlayYTVideo() {
        if ( ( cbMobileTablet === false ) && ( CbYTPlayerCheck.length > 0 ) ) {
            cbYTPlayerHolder.playVideo();
        }
    }

    function cbPauseYTVideo() {
        if ( ( cbMobileTablet === false )  && ( CbYTPlayerCheck.length > 0 ) ) {
            cbYTPlayerHolder.pauseVideo();
        }
    }

})(jQuery);

var cbYTPlayerHolder,
cbEmbedIconData = jQuery('#cb-embed-icon-trigger').data('cb-pid'),
CbYTPlayer = jQuery('#cb-yt-player-' + cbEmbedIconData),
cbYouTubeVideoID = CbYTPlayer.text();

if ( CbYTPlayer.length > 0 ) {
    var tag = document.createElement('script');
    tag.src = "//www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
}
        
function onYouTubeIframeAPIReady() {
    if ( CbYTPlayer.length > 0 ) {
        cbYTPlayerHolder = new YT.Player('cb-yt-player-' + cbEmbedIconData, {
            videoId: cbYouTubeVideoID
        });
    }
}