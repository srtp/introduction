import React,{useEffect} from 'react'
import './Popup.css'

export default function Popup(props) {
    useEffect(() => {
       console.log('Popup start');
       document.documentElement.style.overflowY = 'hidden'
       return ()=>{
           console.log('Popup end');
           document.documentElement.style.overflowY = 'auto'
       }
    }, [])
    return (
        <div onClick={props.onPopupClose} className='popup'>
            
        </div>
    )
}
