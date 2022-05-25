class Rank{
    constructor(button){
        this.button = button;
        this.text = document.querySelector(".rank p")
    }

    get ranks(){
        this.fetchData();
    }

    fetchData(){
        this.button.addEventListener("click", ()=>{
            fetch(window.location + "/rank")
                .then(response => response.text())
                .then(data =>putData(data));
        });
    }

    putData(data){
        if(data != null){
            this.text.textContent = data;
        }
    }

  }

  let button = document.querySelector(".rank");
  const ranks = new Rank(button);
  ranks.fetchData();
