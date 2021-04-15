var Base = function(){

};
Base.prototype = {
    alert : function(){
        alert(1111);
    },

    url : null,
    params : {},
    method : 'post',

    setUrl : function(url){
        this.url = url;
        return  this;
    },
    getUrl : function(){
        return this.url;
    },
    setMethod : function(method){
        this.method = method;
        return  this;
    },
    getMethod : function(){
        return this.method;
    },
    resetParams : function(){
        this.params = {};
        return this;
    },
    setParams : function(params){
        this.params = params;
        return  this;
    },
    getParams : function(key){
        if(typeof key === 'undefined'){
            return this.params;
        }
        if(typeof this.params[key] == undefined){
            return null;
        }
        return this.params[key];
    },
    addParam : function(key, value){
        this.params[key] = value;
        return this;
    },
    removeParam : function(key){
        if(typeof this.params[key] != 'undefined'){
            delete this.params[key];
        }

        return this;
    },
    setForm : function(button){
		this.form = $(button).closest('form');
		this.setUrl(this.form.attr('action'));
		this.setParams(this.form.serialize());
		this.setMethod(this.form.attr('method'));
		return this;
	},

	getForm : function() {
		return this.form;
	},
    /*
    load : function(){
        var request = jQuery.ajax({
            method: this.getMethod(),
            url: this.getUrl(),
            data: this.getParams(),
            success: function(response){
                $(response.element.selector).html(response.element.html);
                //alert(response.status);
                //console.log(response.status);
            }
        });
        // request.done(function(response){
        //     console.log(response);
        // });
    },
    */
    load : function(){
        self = this;
        var request = $.ajax({
            method : this.getMethod(),
            url : this.getUrl(),
            data : this.getParams(),
            success : function(response){
                self.manageHtml(response);
            }
        });
    },
    manageHtml : function(response){
        if(typeof response.element == 'undefined')
        {
            return false;
        }
        if(Array.isArray(response.element))
        {
            $.each(response.element,function(key,value){
                $(value.selector).html(value.html);
            });
        }
        else
        {
            $(response.element.selector).html(response.element.html);
        }
    }
}

var object = new Base();
$(document).ready(function(){
object.setUrl('http://localhost/Application/index.php?c=admin\\dashboard&a=grid');
object.load();
});