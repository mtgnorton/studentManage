	
    /*
     *此函数的作用是：
     *获得html页面中隐藏的跳转页面url
     *
     */
    function del_suffix (pre) {
	  var temp = pre.indexOf('shtml');
	      pre = pre.substr(0, temp - 1);
	      return pre;
	}

    /*
     *此函数的作用是：
     *send_form和announce函数结合起来完成公告的发布和动态更新
     *调用页面：view/index/index_teacher,此button在/public/header.html中
     */
 	function send_form(announce) {
        $.ajax({
            cache: true,
            type: "POST",
            url: del_suffix($('#insert_announce').val()),
            data: {
            announce :announce,	
            }, // 你的formid
            async: false,
            error: function(data) {
                alert("Connection error");
            },
            success: function(response) {
            if (response.flag   ==    0) 
                    {
                     alert(response.msg);
            }else{
                     $("#announce_dis").text(announce);
             }
             
            }
        });

    }
	function announce(){
		 swal({   
		 title: "请输入公告!",  
		 // text: "Write something interesting:",  
		 type: "input", 
		 showCancelButton: true, 
		 closeOnConfirm: false,  
		 animation: "slide-from-top", 
		 inputPlaceholder: "在这里输入" }, 
		 function(inputValue){   
		 if (inputValue === false)
		 return false;      
		 if (inputValue === "") {  
		 swal.showInputError("您没有输入!"); 
		  return false  
		  }  
		 send_form(inputValue);
		 swal("已完成!", "您发布的公告为： " + inputValue, "success"); });

		}

        /*
         *此函数的作用是：
         *将老师布置的作业ajax到后台
         *调用页面view/course/send_work.html
         */
	function send_content(id) {
        if (id == null && id  == undefined && id == "" ) {
            id='';
        }
		var content 	= UM.getEditor('myEditor').getContent();
        var type        = $('#div_type input[name="type"]:checked ').val();
        var title       = $('#title').val();
        if (title == null || title == undefined || title == ""  ) {
            sweetAlert('请输入标题','','error');
            exit;
        }
        $.ajax({
            cache: true,
            type: "POST",
            url: del_suffix($('#send_content').val()),
            data: {
            content : content,	
            type    : type,
            title   : title,
            id      : id,
            }, // 你的formid
            async: false,
            error: function(data) {
                alert("Connection error");
            },
            success: function(response) {
            if (response.flag   ==    0) 
                    {
                    sweetAlert(response.msg, "", "error");
            }else{
                    swal(response.msg, "", "success");
             }
             
            }
        });

    }

        /*
         *此处的作用是：
         *退出登录
         *
         */
         function send_logout(announce) {

        $.ajax({
            cache: true,
            type: "POST",
            url: del_suffix($('#send_logout').val()),
            data: {
            logout : 1, 
            }, // 你的formid
            async: false,
            error: function(data) {
                alert("Connection error");
            },
            success: function(response) {
            if (response.flag   ==    0) 
                    {
                     sweetAlert(response.msg, "", "error");
            }else{
                      url =    del_suffix($('#login_page').val()) ;
                      window.location.href = url;  
             }
             
            }
        });

    }

    /*
     *此处的作用是：
     *学生提交作业 和修改作业
     *
     */
     function send_task(id) {
        if (id == null && id  == undefined && id == "" ) {
            id='';
        }
        var content     = UM.getEditor('myEditor').getContent();
        $.ajax({
            cache: true,
            type: "POST",
            url: del_suffix($('#send_task').val()),
            data: {
            content : content,  
            id      : id,
            }, // 你的formid
            async: false,
            error: function(data) {
                alert("Connection error");
            },
            success: function(response) {
            if (response.flag   ==    0) 
                    {
                    sweetAlert(response.msg, "", "error");
            }else{
                    swal(response.msg, "", "success");
             }
             
            }
        });

    }
    function fanhui(argument) {
          url =    del_suffix($('#fanhui_path').val()) ;
          window.location.href = url;  
    }