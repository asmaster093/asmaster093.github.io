self.addEventListener('push', 
    function(event) {
        event.waitUntil(
            self.registration.pushManager.getSubscription().then(
                function(subscription){
                    var d = new Date(); 
                    var uni = d.getHours()+d.getMinutes()+d.getSeconds();
                    return fetch('http://www.putlockermojo.com/push/pushSubscribeAjax.php?action=get_pushmsg&endpoint='+subscription.endpoint+'&uuu='+uni)
                        .then(
                            function(response){
                                return response.json().then(
                                    function(data){
                                        var Obj = data;
                                        if(Obj.success == '1'){
                                            title = Obj.title;
                                            body  = Obj.body;
                                            icon  = Obj.icon;
                                            tag   = Obj.tag;
                                            var data = {
                                                doge: {
                                                    link: Obj.link,
                                                    msg_id: Obj.msg_id
                                                }
                                              };  
                                                //event.waitUntil(
                                                  return self.registration.showNotification(title, {
                                                       body: body,
                                                       icon: icon,
                                                       tag: tag,
                                                       data:data,
                                                       requireInteraction: true,
                                                     });
                                                //);



                                        }//END SUCCESS
                                    }
                                );
                            }
                        );
                    }
                )
            );
        }
    );
    
    self.addEventListener('notificationclick', function(event){
	
        event.notification.close();

        var doge = event.notification.data.doge;

        fetch("http://www.putlockermojo.com/push/pushSubscribeAjax.php?action=click_count&msg_id="+doge.msg_id)
                                            .then(function(response){});

        event.waitUntil(clients.openWindow(doge.link));
    });