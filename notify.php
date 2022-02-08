<?php
    
      
        $message = "you have a new message";
        $result ="success";
        $mode ="success";
        echo " <script>
    
       var k, f = -1,
        m = 0;
        var duration ='500';
        var HideDuration ='1000';
        var timeout ='10000';
        var extendedTimeout ='1000';
        var showEasing= 'swing';
        var hideEasing= 'linear';
        var showMethod= 'fadeIn';
        var hideMethod= 'fadeOut';
        
            //code start
            var t, o, e = 'success', //info - success - warning - error
            a = 'you have a new message',
            n = 'success',
            s = duration,
            i = HideDuration,
            r = timeout,
            l = extendedTimeout,
            c = showEasing,
            p = hideEasing,
            d = showMethod,
            h = hideMethod,
            u = m++,
            g = $('#addClear').prop('checked');
    
            toastr.options = {
            closeButton: $('#closeButton').prop('checked'),
            debug: $('#debugInfo').prop('checked'),
            newestOnTop: $('#newestOnTop').prop('checked'),
            progressBar: true,
            positionClass: $('#positionGroup input:radio:checked').val() || 'toast-top-right',
            preventDuplicates: $('#preventDuplicates').prop('checked'),
            onclick: null
            }
            , $('#addBehaviorOnToastClick').prop('checked') && (toastr.options.onclick = function() {
            alert('You can perform some custom action after a toast goes away')
            }), 300 && (toastr.options.showDuration = duration), HideDuration && (toastr.options.hideDuration = HideDuration), timeout && (toastr.options.timeOut = g ? 0 : timeout), extendedTimeout && (toastr.options.extendedTimeOut = g ? 0 : extendedTimeout), showEasing && (toastr.options.showEasing = showEasing), hideEasing && (toastr.options.hideEasing = hideEasing), showMethod && (toastr.options.showMethod = showMethod), hideMethod && (toastr.options.hideMethod = hideMethod), g && (t = (t = a) || '', a = t += '', toastr.options.tapToDismiss = !1), a || (++f === (o = ['', '', 'aq!', '', '']).length && (f = 0), a = o[f]), $('#toastrOptions').text('hi');
            var v = toastr[e](a, n);
            void 0 !== (k = v) && (v.find('#okBtn').length && v.delegate('#okBtn', 'click', function() {
            alert('you clicked me. i was toast #' + u + '. goodbye!'), v.remove()
            }), v.find('#surpriseBtn').length && v.delegate('#surpriseBtn', 'click', function() {
            alert('Surprise! you clicked me. i was toast #' + u + '. You could perform an action here.')
            }), v.find('.clear').length && v.delegate('.clear', 'click', function() {
            toastr.clear(v, {
                force: !0
            })
            }))
    
            //code End
      
      
      </script> ";
    
    
 
    
    ?>