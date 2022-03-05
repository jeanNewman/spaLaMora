let user = document.head.querySelector('meta[name="user"]');

module.exports = {

    computed:{
        user(){
            return JSON.parse(user.content);
        },

        isRole(){
          // console.log(JSON.parse(user.content));
             if (JSON.parse(user.content).idrol != 1){
              return true;}
              else{ return false;}
             
        },
        isUsuario(){
             return JSON.parse(user.content).usuario;
        }
    }

}