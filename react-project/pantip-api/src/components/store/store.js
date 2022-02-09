import { makeAutoObservable } from "mobx";
import axios from "axios";

const url = `http://localhost:3001`;

class Store {
  genId = Math.floor(100000 + Math.random() * 900000);
  genIdComment = Date.now();
  posts = [];
  thePost = [];
  editPost = [];
  comments = [];
  theComments = [];
  constructor() {
    makeAutoObservable(this);
  }

  getAllPost() {
    axios.get(`${url}/posts`).then((res) => {
      this.posts = res.data;
    });
  }

  getByid(id) {
    axios.get(`${url}/posts/${id}`).then((res) => {
      this.thePost = res.data;
    });
  }

  createPost(newPost) {
    axios
      .post(`${url}/posts`, {
        id: this.genId,
        topic: newPost.topic,
        content: newPost.content,
        author: newPost.author,
      })
      .then((res) => {
        this.posts.push(res.data);
      });
  }

  delPost(id) {
    axios.delete(`${url}/posts/${id}`).then(() => {
      this.getAllPost();
    });
    axios.delete(`${url}/comments/${id}`).then(() => {
      this.getAllCommentsByIdPost();
    });
  }

  updatePost(editThePost) {
    axios
      .put(`${url}/posts/${editThePost.id}`, {
        topic: editThePost.topic,
        content: editThePost.content,
        author: editThePost.author,
        id: editThePost.id,
      })
      .then((res) => {
        this.posts.push(res.data);
      });
  }

  // Comment
  getAllCommentsByIdPost() {
    axios.get(`${url}/comments/`).then((res) => {
      this.comments = res.data;
    });
  }

  createComment(newComment, id) {
    axios
      .post(`${url}/comments`, {
        postId: Number(id),
        id: this.genIdComment,
        author: newComment.author,
        body: newComment.body,
      })
      .then((res) => {
        this.comments.push(res.data);
      });
  }
}

export const store = new Store();
