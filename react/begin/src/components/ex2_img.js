import React from 'react'

export default function ex2_img(props) {
    return (
        <div>
        {props.image && <img src={props.image} height="100" alt=""/>}
        </div>
    )
}
