<div class="container">
    <div class="w-50 border border-info mx-auto chat">
        <div id="messagesBlock" class="messagesBlock">    
            <?php foreach($this->data as $value) : ?>
                <div class="message border-bottom border-secondary d-flex justify-content-between <?php if($value['from_id'] == $_SESSION['user_id']) echo "flex-row-reverse"?>">
                    <div class="imgDiv"><img class="h-100 w-100 rounded-circle" src="/public/images/users/<?= $value['image'] ?>" alt=""></div>
                    <div class="w-75"><p class="align-middle h-100"><?= $value['body'] ?></p></div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="sendField border-top border-info w-100">
                <div class="h-100  input-group mb-3">
                    <textarea id="msg" type="text" class="form-control h-100" placeholder="Your message"></textarea>
                    <div class="input-group-append">
                        <button onclick="sendMsg(<?= $this->to_id ?>)"  class="btn btn-outline-secondary">Send</button>
                    </div>
                </div>            
        </div>
    </div>

</div>

<script>

    // console.log(document.getElementById('messagesBlock'));
    // let msgDiv = document.getElementById('messagesBlock');
    // msgDiv.scrollTo(0,10000);      
    function sendMsg(to_id){
        let text = document.getElementById('msg').value;
        $.ajax({
            url:`/chat/send/${to_id}/${text}`,
            type:'POST',
            // data:{'to_id':'asdasd', 'text':'asdasd'},
            success: function(data){
                if(data){
                    let data2 = JSON.parse(data);
                    $('#messagesBlock').append(`<div class="message border-bottom border-secondary d-flex justify-content-between flex-row-reverse">
                    <div class="imgDiv"><img class="h-100 w-100 rounded-circle" src="/public/images/users/${data2['image']}" alt=""></div>
                    <div class="w-75"><p class="align-middle h-100">${data2['body']}</p></div>
                    </div>`);
                    
                    let elem = $('#messagesBlock');
                    elem.scrollTo(elem.prop("scrollHeight"));
                    } else {
                    alert("Can't delete this car");
                }
            }
        });
    }
                 
</script>
