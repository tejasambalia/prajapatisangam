!function(a){var b=function(b,c){this.$element=a(b),this.options=a.extend({},a.fn.editstrap.defaults,this.$element.data(),"object"==typeof c&&c),this.init()};b.prototype={constructor:b,init:function(b){if(this.options.type=getType(this.options.type),this.checkEmpty(this.$element),this.$element.wrap(a('<span class="edit-parent-span"></span>')),this.$element.parent().attr("title",this.options.title),this.$element.addClass("editable-field"),this.$element.parent().wrap(a("<span></span>")),this.$element.parent().parent().append('<div><small class="result-message"></small></div>'),void 0===this.options.pk&&(this.options.pk=this.$element.attr("data-edit-pk")),void 0==this.options.name&&(void 0!=this.$element.attr("name")?this.options.name=this.$element.attr("name"):this.options.name=this.$element.attr("id")),this.options.displayEditIcon){var c=a('<span class="edit-icon-container"></span>'),d=a("<i></i>");d.addClass(this.options.editClasses),c.append(d),this.$element.parent().append(c)}var e;e=void 0!=this.options.value?this.options.value:void 0!=this.$element.attr("data-edit-value")?this.$element.attr("data-edit-value"):this.$element.text()!=this.options.emptyText?this.$element.text():"",this.options.value=e;var f=this;this.$element.parent().hover(function(){a(this).removeClass("edit-parent-span"),a(this).addClass("edit-parent-span-hover"),void 0!=f.options.hoverClass&&""!=f.options.hoverClass&&a(this).addClass(f.options.hoverClass),a(this).parent().find(".edit-icon-container").css("opacity",100)}).mouseleave(function(){a(this).addClass("edit-parent-span"),a(this).removeClass("edit-parent-span-hover"),void 0!=f.options.hoverClass&&""!=f.options.hoverClass&&a(this).removeClass(f.options.hoverClass),a(this).find(".edit-icon-container").css("opacity",0)}),this.$element.parent().click(function(b){a(this).attr("data-editable-active",!0),"aa6b25f4-0a95-4ee6-85c1-df90f390079c"!=f.options.type&&a(this).hide();var c=a(this);a(this).parent().prepend(f.getHtml(f.options.value,c))}),a("body").on("click",function(b){var d,c=a(b.target),e=a.merge(f.options.excludeClasses,[".edit-parent-span",".edit-pointer",".edit-form",".select2-body-container",".datepicker-dropdown"]);if("edit()"!=c.attr("onclick")&&a.contains(document.documentElement,b.target)&&!c.is(document)){for(d=0;d<e.length;d++)if(c.is(e[d])||c.parents(e[d]).length)return;a(".edit-parent-span").each(function(b,c){f.closeEditable(a(c),void 0)}),a(".select2-body-container").html(""),a(".result-message").hide()}})},closeEditable:function(b,c){var d=this;if("true"==b.attr("data-editable-active")){if("aa6b25f4-0a95-4ee6-85c1-df90f390079c"!=this.options.type)b.find(".editable-field").html(c),b.show(),this.checkEmpty(b);else if(c.files&&c.files[0]){var e=new FileReader;e.addEventListener("load",function(){d.$element.attr("src",e.result)},!1),e.readAsDataURL(c.files[0])}b.attr("data-editable-active",!1),b.parent().find(".edit-form").remove()}},openNextEditable:function(){var d=a(".editable-field");d.each(function(a,b){if("true"==d.eq(a).parent().attr("data-editable-active")&&a!==d.length-1)return d.eq(a+1).editstrap("edit"),!1})},submitEditable:function(c,d,e){var f=this.options.validateValue(e);if(f.success)if(void 0==this.options.url){if(this.options.value=e,"aa6b25f4-0a95-4ee6-85c1-df90f390079c"!=this.options.type&&(d=this.options.prependText+d+this.options.appendText),this.options.openNext){this.openNextEditable()}this.closeEditable(c,d),this.options.displaySuccess(this.$element,e,d),void 0!=this.options.afterChangeValue&&this.options.afterChangeValue(this.$element,e)}else{var h=this.options.data,i=this;if("65113e7f-d11d-4915-bd25-e66cfdff05e3"==this.options.type)a.extend(h,e);else if("aa6b25f4-0a95-4ee6-85c1-df90f390079c"==this.options.type){var j=new FormData;j.append("file",a("input[type=file]")[0].files[0]),a.extend(h,j)}else h.value=e;void 0!=this.options.pk&&(h.pk=this.options.pk),void 0!=this.options.name&&(h.name=this.options.name),this.$element.parent().parent().find(".result-message").html(this.options.ajaxLoaderIcon+this.options.ajaxLoaderText),this.$element.parent().parent().find(".result-message").show(),void 0!=this.options.beforeSendUpdate&&this.options.beforeSendUpdate(this.$element,h),a.ajax({method:"POST",url:i.options.url,data:h,dataType:i.options.dataType,success:function(a){if(i.$element.parent().parent().find(".result-message").html(""),i.options.value=e,"aa6b25f4-0a95-4ee6-85c1-df90f390079c"!=i.options.type&&(d=i.options.prependText+d+i.options.appendText),i.options.openNext){i.openNextEditable()}i.closeEditable(c,d),i.options.displaySuccess(i.$element,e,d),void 0!=i.options.afterChangeValue&&i.options.afterChangeValue(i.$element,e)},error:function(a,b,c){i.$element.parent().parent().find(".result-message").html(""),i.options.onUpdateError(i.$element,a,b,c)}})}else this.options.displayError(this.$element,f.message)},checkEmpty:function(b){""==b.text()&&b.text(this.options.emptyText)},validateDate:function(c,d,e){if(""===c)return e;var f=d,g=f,h=c,i=h;if(f.length>h.length)return!1;var j=i.indexOf("/")!==-1?"/":i.indexOf("-")!==-1?"-":" ";if(null===j||i.indexOf(j)===-1)return!1;i=i.split(j),g=g.split(j);var k=a.inArray("yyyy",g)!=-1?"yyyy":"yy",l=a.inArray("mm",g)>-1?"mm":"MM",m=a.inArray("dd",g)>-1?"dd":"d",n=i[a.inArray(k,g)],o=i[a.inArray(l,g)],p=i[a.inArray(m,g)];if(o=o.length>2?a.inArray(o,a.fn.datepicker.dates[this.options.language].months)+1:o,!n||!o||!p||4!==n.length)return!1;if(isNaN(n)||isNaN(o)||isNaN(p))return!1;if(p.length>2||o.length>2||n.length>4)return!1;if(p=parseInt(p,10),o=parseInt(o,10),n=parseInt(n,10),n<1e3||n>9999||o<=0||o>12)return!1;var q=[31,28,31,30,31,30,31,31,30,31,30,31];return(n%400===0||n%100!==0&&n%4===0)&&(q[1]=29),!(p<=0||p>q[o-1])},getValueAndText:function(b,c,d,e){var f=c.val();void 0==d&&(d="","65113e7f-d11d-4915-bd25-e66cfdff05e3"==this.options.type&&(d=" "));var g=d;switch(b){case"text":g+=c.val();break;case"select":g+=c.find("option:selected").text();break;case"date":g+=c.val()}return void 0==e&&(e=""),g+=e,{value:f,text:g}},getValue:function(){return this.options.value},getType:function(){return this.options.type},edit:function(){this.$element.parent().trigger("click")},destroy:function(){this.$element.hasClass("editable-field")&&(this.$element.parent().find(".edit-icon-container").remove(),this.$element.parent().parent().find(".result-message").parent().remove(),this.$element.parent().off(),this.$element.removeClass("editable-field"),this.$element.unwrap().unwrap(),a(".select2-body-container").html(""))},getHtml:function(c,d){var e='<span class="validate input-group-addon  edit-validate-'+this.options.validateClass+'"><i class="glyphicon glyphicon-ok"></span>';"block"==this.options.saveOptions&&(e='<div class="save-options"><button class="validate edit-validate-'+this.options.validateClass+'"><i class="glyphicon glyphicon-ok"></i></button><button class="edit-cancel-default"><i class="glyphicon glyphicon-remove"></button></div>');var f=a('<div class="input-group input-group-sm select2-bootstrap-append select2-bootstrap-prepend edit-form" ></div>');if(""!=this.options.prependText&&void 0!=this.options.prependText){var g=a('<span class="input-group-addon">'+this.options.prependText+"</span>");void 0!=this.options.prependClass&&g.addClass(this.options.prependClass),f.prepend(g)}var h=this;switch(this.options.type){case"text":var i=a('<input class="form-control"  />');i.val(c),i.attr("placeholder",h.options.placeholder),f.append(i),f.append(e),f.find(".validate").click(function(){var b=a(this).parent().find("input").val();"block"==h.options.saveOptions&&(b=a(this).parent().parent().find("input").val()),h.submitEditable(d,b,b)}),h.options.validateOnEnter&&f.find("input").keypress(function(b){var c=b.which;if(13==c){var e=a(this).val();h.submitEditable(d,e,e)}});break;case"41799bba-fef4-4841-b4b8-22bd06b39ced":var j=a('<textarea class="form-control"></textarea>');j.css("height","auto"),j.val(c),j.attr("placeholder",h.options.placeholder),j.attr("rows",h.options.textAreaRows),f.append(j),f.append(e),f.find(".validate").click(function(){var b=a(this).parent().find("textarea").val();"block"==h.options.saveOptions&&(b=a(this).parent().parent().find("textarea").val()),h.submitEditable(d,b,b)});break;case"c92727de-4516-410b-9f01-7af8ee3d6ff5":var k=a('<select class="form-control"></select>');c==h.options.emptyText&&k.append('<option value="null">'+c+"</option>"),a.each(h.options.dataSelect,function(a,b){k.append('<option value="'+b.value+'">'+b.text+"</option>")}),f.append(k),f.find("select").val(h.options.value),f.find("select").change(function(){h.submitEditable(d,a(this).find("option:selected").text(),a(this).find("option:selected").val())});break;case"cbf2d8a7-25bd-4afc-a3c3-c84419573251":var k=a('<select class="form-control"></select>');c==h.options.emptyText&&k.append('<option value="null">'+c+"</option>");var l=[];l=a.isFunction(h.options.dataSelect)?h.options.dataSelect():h.options.dataSelect,a.each(l,function(a,b){k.append('<option value="'+b.value+'">'+b.text+"</option>")}),f.append(k),f.find("select").val(h.options.value),f.find("select").change(function(){h.submitEditable(d,a(this).find("option:selected").text(),a(this).find("option:selected").val())}),f.find("select").select2({width:"100%"}),f.removeClass("input-group-sm");break;case"d6668b14-f0fa-40d2-bd0c-aa036a819fc6":var m=a('<div class="input-group input-group-sm select2-bootstrap-append"></div>'),k=a('<select class="form-control" multiple="multiple"></select>'),l=[];l=a.isFunction(h.options.dataSelect)?h.options.dataSelect():h.options.dataSelect,a.each(l,function(a,b){k.append('<option value="'+b.value+'">'+b.text+"</option>")}),k.val(h.options.value),m.append(k),m.append(e),f.append(m);f.find("select").select2({closeOnSelect:!1,width:"100%",dropdownParent:a("body").find(".select2-body-container")});f.find(".validate").click(function(){var b=[];a(this).parent().find("select option:selected").each(function(c,d){b.push(a(d).text())}),h.submitEditable(d,b.join(h.options.multipleSeparator),a(this).parent().find("select").val())});break;case"19445937-986c-4849-935c-5535f24fdb53":var i=a('<input  class="form-control input-group-sm" />');i.val(c),i.attr("placeholder",h.options.placeholder),i.datepicker({format:h.options.dateFormat,language:h.options.language}).on("changeDate",function(b){h.validateDate(a(this).val(),h.options.dateFormat,!1)&&(i.datepicker("hide"),h.submitEditable(d,a(this).val(),a(this).val()))}),f.append(i);break;case"e665f5e6-a354-492a-8829-c0d6f9ed64d3":var i=a('<input class="form-control"  />');i.val(c),i.attr("placeholder",h.options.placeholder),f.append(i),f.find("input").typeahead(h.options.typeahead.options,h.options.typeahead.dataset).bind("typeahead:select",function(b,c){h.submitEditable(d,a(this).val(),a(this).val())}),f.find(".tt-hint").remove();break;case"70c62c48-e2e2-41c2-8463-ae446073117a":var i=a('<input class="form-control" />');i.val(c),i.attr("min",h.options.minValue),i.attr("max",h.options.maxValue);var o=a('<div class="input-group-btn-vertical"></div>');o.append('<button class="btn btn-default btn-up" type="button"><i class="fa fa-caret-up"></i></button>'),o.append('<button class="btn btn-default btn-down" type="button"><i class="fa fa-caret-down"></i></button>'),f.append(i),f.append(o),f.append(e),f.find(".btn-up").on("click",function(){var b=a(this),c=b.closest(".edit-form").find("input");void 0==c.attr("max")||parseInt(c.val())<parseInt(c.attr("max"))?c.val(parseInt(c.val(),10)+1):b.next("disabled",!0)}),f.find(".btn-down").on("click",function(){var b=a(this),c=b.closest(".edit-form").find("input");void 0==c.attr("min")||parseInt(c.val())>parseInt(c.attr("min"))?c.val(parseInt(c.val(),10)-1):b.prev("disabled",!0)}),f.find(".validate").click(function(){var b=a(this).parent().find("input").val();h.submitEditable(d,b,b)});break;case"8683f9a2-1072-44ce-9f3e-e5b42066b461":var i=a('<input  class="form-control input-group-sm" data-role="tagsinput" />');i.val(c),i.attr("placeholder",h.options.placeholder),f.append(i),f.append(e);var p=f.find("input");p.tagsinput({tagClass:function(a){return"label label-info"}}),f.removeClass("input-group-sm"),f.find(".bootstrap-tagsinput").addClass("form-control"),f.find(".validate").click(function(){var a=p.tagsinput("items");h.submitEditable(d,a.join(h.options.multipleSeparator),a)});break;case"65113e7f-d11d-4915-bd25-e66cfdff05e3":a.each(this.options.complexEdit,function(b,c){var d=a('<span class="multiple-edit-span"></span>');switch(void 0!=c.width&&d.css("width",c.width),c.type){case"select":var e=a('<select class="form-control "></select>');a.each(c.dataSelect,function(a,b){e.append('<option value="'+b.value+'">'+b.text+"</option>")}),e.val(c.value),d.append(e),f.append(d);break;case"text":var g=a('<input class="form-control" />');g.val(c.value),void 0!=c.placeholder&&g.attr("placeholder",c.placeholder),d.append(g),f.append(d);break;case"date":var g=a('<input class="form-control input-group-sm" />');g.val(c.value),void 0!=c.plaholder&&g.attr("placeholder",c.plaholder);c.dateFormat||h.options.dateFormat;g.datepicker({format:c.dateFormat,language:h.options.language}).on("changeDate",function(a){g.datepicker("hide")}),d.append(g),f.append(d)}}),f.append(e),f.find(".validate").click(function(){var b="",c={};a(this).parent().parent().find("input,select").each(function(d,e){var f=h.getValueAndText(h.options.complexEdit[d].type,a(e),h.options.complexEdit[d].prepend,h.options.complexEdit[d].append);void 0!=h.options.complexEdit[d].name&&(c[h.options.complexEdit[d].name]=f.value),b+=f.text,h.options.complexEdit[d].value=f.value}),h.submitEditable(h.$element.parent(),b,c)})}if(f.find(".edit-cancel-default").click(function(){h.closeEditable(h.$element.parent(),void 0),a(".select2-body-container").html(""),a(".result-message").hide()}),""!=this.options.appendText&&void 0!=this.options.appendText){var g=a('<span class="input-group-addon">'+this.options.appendText+"</span>");void 0!=this.options.appendClass&&g.addClass(this.options.appendClass),f.find(".validate").length?g.insertBefore(f.find(".validate")):f.append(g)}return f}},a.fn.editstrap=function(c,d){var e=[];return this.each(function(){var f=a(this).data("editstrap");if(f)if(c||d){if(void 0!==f[c]){var g=f[c](d);void 0!==g&&e.push(g)}}else e.push(f);else f=new b(this,c),a(this).data("editstrap",f),e.push(f)}),"string"==typeof c?e.length>1?e:e[0]:e},a.fn.editstrap.defaults={title:"Click to edit",emptyText:"None",type:"text",language:"en",dateFormat:"mm/dd/yyyy",validateClass:"default",appendText:"",prependText:"",multipleSeparator:" ",value:void 0,dataSelect:[],data:{},displayEditIcon:!0,editClasses:"glyphicon glyphicon-pencil",delayToHide:3e3,successMessage:"Value changed successfully",errorMessage:"Error has occured",successClass:"edit-has-success",errorClass:"edit-has-error",displaySuccess:function(a,b,c){var d=a.parent().parent().find(".result-message");d.removeClass("edit-has-success edit-has-error"),d.html(this.successMessage),d.addClass(this.successClass),d.show().delay(this.delayToHide).fadeOut()},displayError:function(a,b){var c=a.parent().parent().find(".result-message");c.removeClass(this.errorClass+" "+this.successClass),c.html(b),c.addClass(this.errorClass),c.show()},validateValue:function(a){return{success:!0,message:""}},validateOnEnter:!0,textAreaRows:10,excludeClasses:[],placeholder:"",onUpdateError:function(a,b,c,d){this.displayError(a,"Error on submit : "+b.status+" "+d)},ajaxLoaderIcon:'<i class="glyphicon glyphicon-refresh gly-spin"></i>',ajaxLoaderText:" ",openNext:!1,saveOptions:"inline",dataType:"JSON"},a(function(){a("body").append('<div class="select2-body-container"></div>')})}(window.jQuery);