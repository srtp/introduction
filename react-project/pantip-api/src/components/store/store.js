import { makeAutoObservable } from "mobx";
import axios from "axios";

const url = `https://jsonplaceholder.typicode.com/posts`;

class Store {
  posts = [];
  constructor() {
    makeAutoObservable(this);
  }

  go() {
    return console.log("10+10");
  }

  getAllPost() {
    axios.get(`${url}`).then((res) => {
      this.posts = res.data;
    });
  }

  delPost(id){
    axios.delete(`${url}/${id}`).then(()=>{
      this.getAllPost()
    })
  }
}

export const store = new Store();
