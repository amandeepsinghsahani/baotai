var reg;
var sub;
var isSubscribed = false;
//取得button DOM
var subscribeButton = document.querySelector('button');
if ('serviceWorker' in navigator) {
  //如果有serviceWorker可以使用
  console.log('Service Worker is supported');
  //註冊sw.js，其中有實作與推播相關的行為
  navigator.serviceWorker.register('sw.js').then(function() {
    return navigator.serviceWorker.ready;
  }).then(function(serviceWorkerRegistration) {
    //可以開始註冊推播，將讓冊按鈕變成able狀態
    reg = serviceWorkerRegistration;
    subscribeButton.disabled = false;
    console.log('Service Worker is ready :^)', reg);
  }).catch(function(error) {
    console.log('Service Worker Error :^(', error);
  });
}
//設定註夕按鈕的click行為
subscribeButton.addEventListener('click', function() {
  if (isSubscribed) {
    unsubscribe();
  } else {
    subscribe();
  }
});
function subscribe() {
  reg.pushManager.subscribe({userVisibleOnly: true}).
  then(function(pushSubscription){
    //註冊推播成功，印出推播相關訊息，改變註冊按鈕狀態
    sub = pushSubscription;
    console.log('Subscribed! Endpoint:', sub.endpoint);
    subscribeButton.textContent = 'Unsubscribe';
    isSubscribed = true;
    document.getElementById("pushsubscription").innerHTML = JSON.stringify(pushSubscription);
  });
}
function unsubscribe() {
  sub.unsubscribe().then(function(event) {
    //取消註冊推播成功，印出推播相關訊息，改變註冊按鈕狀態
    subscribeButton.textContent = 'Subscribe';
    console.log('Unsubscribed!', event);
    isSubscribed = false;
  }).catch(function(error) {
    console.log('Error unsubscribing', error);
    subscribeButton.textContent = 'Subscribe';
  });
}