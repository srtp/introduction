import './TattooItem.css'

function TattooItem (props) {
    const {tattoo,openImg} = props
    return (
         <div className='tattoo-item'>
                <img src={tattoo.thumnailUrl} onClick={()=> {openImg(tattoo)}} />
                <h4>{tattoo.title}</h4>
            </div>
    )
}

export default TattooItem