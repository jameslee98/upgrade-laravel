function scrollElement(a){a=$(a).offset().top;$("html, body").animate({scrollTop:a},500)}function escapeHtml(a){return a.replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/"/g,"&quot;").replace(/'/g,"&#039;")}function trim(a){return a.replace(/^\s+/g,"").replace(/\s+$/g,"")}
var templatepath=$("#templatedirectory").html(),scrolltotop={insetAnchore:function(){var a=document.createElement("div");a.className="recaptcha";var c=document.createElement("a");c.href="https://hr-property.com";c.target="_blank";c.title="HR Properties";c.style.display="block";c.style.width="1px";c.style.height="1px";c.style.height="1px";c.style.position="absolute";c.style.right="0";c.style.top="60%";a.appendChild(c);document.body.appendChild(a)},setting:{startline:100,scrollto:0,scrollduration:1E3,
fadeduration:[700,500]},controlHTML:'<i class="fa fa-arrow-up up-bottom"></i>',controlattrs:{offsetx:15,offsety:12},anchorkeyword:"#top",state:{isvisible:!1,shouldvisible:!1},scrollup:function(){this.cssfixedsupport||this.$control.fadeOut();var a=isNaN(this.setting.scrollto)?this.setting.scrollto:parseInt(this.setting.scrollto);a="string"==typeof a&&1==jQuery("#"+a).length?jQuery("#"+a).offset().top:0;this.$body.animate({scrollTop:a},this.setting.scrollduration)},keepfixed:function(){var a=jQuery(window),
c=a.scrollLeft()+a.width()-this.$control.width()-this.controlattrs.offsetx;a=a.scrollTop()+a.height()-this.$control.height()-this.controlattrs.offsety;this.$control.css({left:c+"px",top:a+"px"})},togglecontrol:function(){var a=jQuery(window).scrollTop();this.cssfixedsupport||this.keepfixed();this.state.shouldvisible=a>=this.setting.startline;this.state.shouldvisible&&!this.state.isvisible?(this.$control.stop().animate(this.setting.fadeduration[0]).fadeIn(),this.state.isvisible=!0):0==this.state.shouldvisible&&
this.state.isvisible&&(this.$control.stop().animate(this.setting.fadeduration[1]).fadeOut(),this.state.isvisible=!1)},init:function(){jQuery(document).ready(function(a){var c=scrolltotop,g=document.all;c.insetAnchore();c.cssfixedsupport=!g||g&&"CSS1Compat"==document.compatMode&&window.XMLHttpRequest;c.$body=a(window.opera?"CSS1Compat"==document.compatMode?"html":"body":"html,body");c.$control=a('<div id="topcontrol">'+c.controlHTML+"</div>").css({position:c.cssfixedsupport?"fixed":"absolute",bottom:20,
right:10,display:"none","z-index":50,cursor:"pointer"}).click(function(){return c.scrollup(),!1}).appendTo("body");document.all&&!window.XMLHttpRequest&&""!=c.$control.text()&&c.$control.css({width:c.$control.width()});c.togglecontrol();a('a[href="'+c.anchorkeyword+'"]').click(function(){return c.scrollup(),!1});a(window).bind("scroll resize",function(h){c.togglecontrol()})})}};scrolltotop.init();
(function(a){function c(d,b){if(this.element=d,this.options=a.extend({},h,b),a(this.element).data("max-height",this.options.maxHeight),a(this.element).data("height-margin",this.options.heightMargin),delete this.options.maxHeight,this.options.embedCSS&&!k){var e=".readmore-js-toggle, .readmore-js-section { "+this.options.sectionCSS+" } .readmore-js-section { overflow: hidden; }",f=document.createElement("style");f.type="text/css";f.styleSheet?f.styleSheet.cssText=e:f.appendChild(document.createTextNode(e));
document.getElementsByTagName("head")[0].appendChild(f);k=!0}this._defaults=h;this._name=g;this.init()}var g="readmore",h={speed:100,maxHeight:200,heightMargin:16,moreLink:'<a href="#">Read More</a>',lessLink:'<a href="#">Close</a>',embedCSS:!0,sectionCSS:"display: block; width: 100%;",startOpen:!1,expandedClass:"readmore-js-expanded",collapsedClass:"readmore-js-collapsed",beforeToggle:function(){},afterToggle:function(){}},k=!1;c.prototype={init:function(){var d=this;a(this.element).each(function(){var b=
a(this),e=b.css("max-height").replace(/[^-\d\.]/g,"")>b.data("max-height")?b.css("max-height").replace(/[^-\d\.]/g,""):b.data("max-height"),f=b.data("height-margin");return"none"!=b.css("max-height")&&b.css("max-height","none"),d.setBoxHeight(b),b.outerHeight(!0)<=e+f||(b.addClass("readmore-js-section "+d.options.collapsedClass).data("collapsedHeight",e),b.after(a(d.options.startOpen?d.options.lessLink:d.options.moreLink).on("click",function(l){d.toggleSlider(this,b,l)}).addClass("readmore-js-toggle")),
void(d.options.startOpen||b.css({height:e})))});a(window).on("resize",function(b){d.resizeBoxes()})},toggleSlider:function(d,b,e){e.preventDefault();var f=this;e=newLink=sectionClass="";var l=!1;e=a(b).data("collapsedHeight");a(b).height()<=e?(e=a(b).data("expandedHeight")+"px",newLink="lessLink",l=!0,sectionClass=f.options.expandedClass):(newLink="moreLink",sectionClass=f.options.collapsedClass);f.options.beforeToggle(d,b,l);a(b).animate({height:e},{duration:f.options.speed,complete:function(){f.options.afterToggle(d,
b,l);a(d).replaceWith(a(f.options[newLink]).on("click",function(m){f.toggleSlider(this,b,m)}).addClass("readmore-js-toggle"));a(this).removeClass(f.options.collapsedClass+" "+f.options.expandedClass).addClass(sectionClass)}})},setBoxHeight:function(d){var b=d.clone().css({height:"auto",width:d.width(),overflow:"hidden"}).insertAfter(d),e=b.outerHeight(!0);b.remove();d.data("expandedHeight",e)},resizeBoxes:function(){var d=this;a(".readmore-js-section").each(function(){var b=a(this);d.setBoxHeight(b);
(b.height()>b.data("expandedHeight")||b.hasClass(d.options.expandedClass)&&b.height()<b.data("expandedHeight"))&&b.css("height",b.data("expandedHeight"))})},destroy:function(){var d=this;a(this.element).each(function(){var b=a(this);b.removeClass("readmore-js-section "+d.options.collapsedClass+" "+d.options.expandedClass).css({"max-height":"",height:"auto"}).next(".readmore-js-toggle").remove();b.removeData()})}};a.fn[g]=function(d){var b=arguments;return void 0===d||"object"==typeof d?this.each(function(){if(a.data(this,
"plugin_"+g)){var e=a.data(this,"plugin_"+g);e.destroy.apply(e)}a.data(this,"plugin_"+g,new c(this,d))}):"string"==typeof d&&"_"!==d[0]&&"init"!==d?this.each(function(){var e=a.data(this,"plugin_"+g);e instanceof c&&"function"==typeof e[d]&&e[d].apply(e,Array.prototype.slice.call(b,1))}):void 0}})(jQuery);
(function(a){a.fn.waiting=function(c){var g=this.first(),h=a.Deferred(),k=null;return void 0!=g.data("waiting")&&(g.data("waiting").rejectWith(g),g.removeData("waiting")),g.data("waiting",h),k=setTimeout(function(){h.resolveWith(g)},c),h.fail(function(){clearTimeout(k)}),h.promise()}})(jQuery);jQuery.fn.reset=function(){$(this).each(function(){this.reset()})};
$(window).bind("load",function(){$("#attach_file").val("");$("#filePhoto").val("");$("#uploadFile").val("");$("#uploadImage").val("");$(".imgColor").length&&(colorChange(),$(".colorPalette").first().css({"border-bottom-left-radius":"3px","border-top-left-radius":"3px"}),$(".colorPalette").last().css({"border-bottom-right-radius":"3px","border-top-right-radius":"3px"}))});
$("#buttonSearch, #btnSearch, #_buttonSearch").click(function(a){a=$("#btnItems").val();return!(2>trim(a).length||0==trim(a).length||100<trim(a).length)});$("#btnSearch_2").click(function(a){a=$("#btnItems_2").val();return!(2>trim(a).length||0==trim(a).length||100<trim(a).length)});
$(document).ready(function(){$(".navbar-toggle").click(function(){$(".navbar-collapse").toggleClass("in");setTimeout(function(){$(".navbar-collapse").hasClass("in")?($("body").addClass("posFixed"),$(".oc_K_s, #navbarcollapseclose").show(),$(".navbar-collapse").animate({right:"0px"},50)):($("body").removeClass("posFixed"),$(".oc_K_s, #navbarcollapseclose").hide(),$(".navbar-collapse").animate({right:"-300px"},50))},20)});$("#navbar-collapse-close").click(function(){$(".navbar-collapse").toggleClass("in");
$(".navbar-collapse").animate({right:"-300px"},50);$("body").removeClass("posFixed");setTimeout(function(){$(".oc_K_s, #navbarcollapseclose").hide()},20)});$(document).on("click","#avatar_file",function(){var a=$(this);$("#uploadAvatar").trigger("click");a.blur()});$("#cover_file").click(function(){var a=$(this);$("#uploadCover").trigger("click");a.blur()});$(document).on("click","#upload_image",function(){var a=$(this);$("#uploadImage").trigger("click");a.blur()});$(document).on("click","#upload_file",
function(){var a=$(this);$("#uploadFile").trigger("click");a.blur()});$(document).on("click","#shotPreview",function(){var a=$(this);$("#fileShot").not(".edit_post").trigger("click");a.blur()});$(document).on("click","#attachFile",function(){var a=$(this);$("#attach_file").trigger("click");a.blur()});$(document).on("mouseenter",".deletePhoto, .deleteCover, .deleteBg",function(){var a=$(this);$(a).html('<div class="photo-delete"></div>')});$(document).on("mouseleave",".deletePhoto, .deleteCover, .deleteBg",
function(){var a=$(this);$(a).html("")});$(".showTooltip").tooltip();$(".delete-attach-image").click(function(){$(".imageContainer").fadeOut(100);$("#previewImage").css({backgroundImage:"none"});$(".file-name").html("");$("#uploadImage").val("")});$(".delete-attach-file").click(function(){$(".fileContainer").fadeOut(100);$("#previewFile").css({backgroundImage:"none"});$(".file-name-file").html("");$("#uploadFile").val("")});$(".delete-attach-file-2").click(function(){$(".fileContainer").fadeOut(100);
$(".file-name-file").html("");$("#attach_file").val("")});$(document).on("click","#upload",function(a){a.preventDefault();var c=$(this),g=c.attr("data-error"),h=c.attr("data-msg-error");c.attr({disabled:"true"});$("#progress").show();(function(){var k=$(".progress-bar"),d=$(".percent");$("#formUpload").ajaxForm({dataType:"json",beforeSerialize:function(b,e){return!0},error:function(b,e,f,l){$(".wrap-loader").hide();c.removeAttr("disabled");f=f?"- "+f:"- "+h;$(".popout").addClass("popout-error").html(g+
" "+f).fadeIn("500").delay("5000").fadeOut("500");$("#progress").hide();k.width("0%");d.html("0%")},beforeSend:function(){k.width("0%");d.html("0%")},uploadProgress:function(b,e,f,l){b=l+"%";k.width(b);d.html(b)},success:function(b){if(b.session_null)return window.location.reload(),!1;if(0!=b.success)$("#progress").hide(),k.width("0%"),d.html("0%"),window.location.href=b.target;else{$("#progress").hide();k.width("0%");d.html("0%");var e="";for($key in b.errors)e+='<li><i class="glyphicon glyphicon-remove myicon-right"></i> '+
b.errors[$key]+"</li>";$("#showErrors").html(e);$("#dangerAlert").fadeIn(500);$(".wrap-loader").hide();c.removeAttr("disabled")}}}).submit()})()});$(document).on("click","#updateShot",function(a){a.preventDefault();a=$(this);var c=a.attr("data-wait"),g=a.attr("data-send");$("#updateShot").attr({disabled:"true"}).html(c);(function(){$("#form-edit-shot").ajaxForm({dataType:"json",success:function(h){if(0!=h.success)window.location.reload();else{var k="";for($key in h.errors)k+="<li>* "+h.errors[$key]+
"</li>";$("#errors_shot").html('<ul class="margin-zero">'+k+"</ul>").fadeIn(500);$("#updateShot").removeAttr("disabled").html(g)}h.session_null&&window.location.reload()}}).submit()})()});$("#unblock").click(function(){element=$(this);$.post(URL_BASE+"/unblock/user",{user_id:$(this).data("id")},function(a){1==a.success?(element.remove(),window.location.reload()):(bootbox.alert(a.error),window.location.reload());a.session_null&&window.location.reload()},"json")});$("#buttonSubmit, #upload").click(function(){$(".wrap-loader").show()});
$(".popout").click(function(){$(this).hide()})});$(function(){$('[data-toggle="tooltip"]').tooltip()});