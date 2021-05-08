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

        // var y = time.getFullYear();
        // var m = ("00" + (time.getMonth() + 1)).slice(-2);
        // var d = ("00" + time.getDate()).slice(-2);

        let timeSplit = time.split(" ");
        let yearData = timeSplit[0];
        let tiemData = timeSplit[1];

        yearData = yearData.split("-");
        tiemData = tiemData.split(":");

        let year = yearData[0];
        let mouth = yearData[1];
        let day = yearData[2];

        let hour = tiemData[0];
        let minutes = tiemData[1];
        let econds = tiemData[2];

        console.log(yearData, tiemData);

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

        var html = `                                        
                    <div class="media my-3 d-flex justify-content-${flex}">          
                    
                      <div class="media-body comment-body col-4">
                      
                        <div class="row d-flex justify-content-between align-items-center">

                          <div class="col-2 d-flex justify-content-center align-items-center flex-column p-0">
                            ${logo}
                            <span class="comment-body-user">${name}</span>
                          </div>

                          <div class="col-10 row bg-main rounded py-3">
                            <span class="col-10 comment-body-content text-subTitle">
                              ${data.comments[i].content}
                            </span>
                          </div>
                          
                        </div>

                        <div class="d-flex justify-content-end">                                              
                          <span class="comment-body-time">${hour}時 ${minutes}分</span>
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
