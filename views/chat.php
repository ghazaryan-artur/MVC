<div class="container">
    <div class="backBtn w-50 mx-auto my-3">
        <a class="btn btn-info" href="/profile/friends">Back to freinds</a>
    </div>

    <div class="chat w-50 border border-info mx-auto">
        <div id="messagesBlock" class="messagesBlock">    
            <?php foreach($this->data as $msg) : ?>
                <div id="<?= $msg['id'] ?>" class="message border-bottom border-secondary d-flex justify-content-between <?php if($msg['from_id'] == $_SESSION['user_id']) echo "flex-row-reverse"?>">
                    <div class="imgDiv"><img class="h-100 w-100 rounded-circle" src="/public/images/users/<?= $msg['image'] ?>" alt=""></div>
                    <div class="w-75">
                    <h5 ><?= $msg['name'] ?> <small><?= $msg['date'] ?></small></h5>
                    <p class="align-middle h-100 w-100"><?= $msg['body'] ?></p></div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="sendField border-top border-info w-100">
                <div class="h-100  input-group mb-3">
                    <textarea id="msg_body" type="text" class="form-control h-100" placeholder="Your message"></textarea>
                    <div class="input-group-append">
                        <button onclick="sendMsg(<?= $this->to_id ?>)"  class="btn btn-outline-secondary">Send</button>
                    </div>
                </div>            
        </div>
    </div>


</div>

<script>
    let msgDiv = document.getElementById('messagesBlock');
    let lastId = "<?= $this->data[count($this->data)-1]['id'] ?? 0 ?>";
    msgDiv.scrollTop = msgDiv.scrollHeight;


    function sendMsg(to_id){
        let msgDiv = $('#messagesBlock');
        let text = document.getElementById('msg_body').value;

        $.ajax({
            url:'/chat/send/',
            type:'POST',
            data:{'to_id':to_id, 'text':text},
            dataType: 'json',
            success: function(res){
                if(res.success){
                    msgDiv.append(`
                    <div id=${res.data['id']} class="message border-bottom border-secondary d-flex justify-content-between flex-row-reverse">
                        <div class="imgDiv"><img class="h-100 w-100 rounded-circle" src="/public/images/users/${res.data['image']}" alt=""></div>
                        <div class="w-75">
                        <h5 >${res.data['name']} <small> ${res.data['date']}</small></h5>
                        <p class="align-middle h-100 w-100">${res.data['body']}</p></div>
                    </div>`);

                    msgDiv[0].scrollTop = msgDiv[0].scrollHeight;
                } else {
                    console.log('any message don`t insert');
                }
            }
        });

        document.getElementById('msg_body').value = '';
    }

    setInterval(() => {
        let msgDiv = $('#messagesBlock');
        // console.log('last id is ' + lastId);
        $.ajax({
            url: "/chat/refresh",
            type:'POST',
            data: {
                to_id: '<?= $this->to_id ?>', 
                msg_id: lastId
            },
            dataType: 'json',
            success: function(res){
                if(res.success){                   
                    let parentNode = document.getElementById('messagesBlock');
                    let child;
                    res.data.forEach(function(msg) {
                        lastId = msg['id'];
                        child = document.getElementById(msg['id']);
                        if (child){ // if message from me -> delete from page
                            parentNode.removeChild(child);
                        }
                    });

                    res.data.forEach(function(msg) {
                        msgDiv.append(`
                            <div id=${msg['id']} class="message border-bottom border-secondary d-flex justify-content-between flex-row-reverse">
                                <div class="imgDiv"><img class="h-100 w-100 rounded-circle" src="/public/images/users/${msg['image']}" alt=""></div>
                                <div class="w-75">
                                <h5 >${msg['name']} <small> ${msg['date']}</small></h5>
                                <p class="align-middle h-100 w-100">${msg['body']}</p></div>
                            </div>`);
                    });

                    msgDiv[0].scrollTop = msgDiv[0].scrollHeight;
                } else {
                    console.log("There is no new msg");
                }
            }
        });
        
        }, 3000);
</script>
