// const { data } = require("autoprefixer");

const { isEmpty } = require("lodash");

const get_data = () => {
  var query = location.href;
  var parmeter = location.search.substring(1);
  console.log(query, parmeter);

  $.ajax({
    url: query + "/result/ajax",
    dataType: "json",
    success: (data) => {
      // auth-confirmation
      const auth = data.auth;

      for (let i = 0; i < data.comments.length; i++) {
        console.log(data.comments[i].content);
        let fromUser = data.comments[i].from_user;
        let fromStoreOwner = data.comments[i].from_store_owner;
        // let toUser = data.comments[i].to_user;
        // let toStoreOwner = data.comments[i].to_store_owner;

        let name = "";
        let logo = "";
        let flex = "start";
        let time = data.comments[i].updated_at;

        if (!isEmpty(fromUser)) {
          name = fromUser.name;
          logo = `<i class="far fa-3x fa-user-circle"></i>`;
        }

        if (auth == "user" && !isEmpty(fromUser)) {
          name = fromUser.name;
          logo = `<i class="far fa-3x fa-user-circle"></i>`;
          flex = "end";
        }

        if (!isEmpty(fromStoreOwner)) {
          name = fromStoreOwner.name;
          logo = `<i class="fas fa-3x fa-store"></i>`;
        }

        if (auth == "store_owner" && !isEmpty(fromStoreOwner)) {
          name = fromStoreOwner.name;
          logo = `<i class="fas fa-3x fa-store"></i>`;
          flex = "end";
        }

        // if (!isEmpty(time)) {
        //   time = time;
        // } else {
        //   time = data.comments[i].created_at;
        // }

        var html = `                                        
                    <div class="media my-3 d-flex justify-content-${flex}">                    
                      <div class="media-body comment-body col-3 bg-main rounded row d-flex justify-content-center py-3 mx-5">                        

                        <div class="col-3 d-flex justify-content-center align-items-center">
                          ${logo}
                        </div>

                        <div class="col-7 d-flex flex-column">                    
                          <span class="comment-body-user">${name}</span>
                          <span class="comment-body-time">${time}</span>                        
                          <span class="comment-body-content">
                            ${data.comments[i].content}
                          </span>
                        </div>

                      </div>
                    </div>
                `;

        $("#comment-data").append(html);
      }
    },
    error: () => {
      alert("error ajax");
    },
  });

  setTimeout("get_data()", 5000);
};

get_data();
