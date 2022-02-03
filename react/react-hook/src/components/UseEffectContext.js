import React from 'react'
import ThemeContext from './ThemeContext'
import UseEffectContextChild from './UseEffectContextChild'

export default function UseEffectContext() {
    return (
        <div>
            <ThemeContext.Provider value="green">
            <UseEffectContextChild/>
            </ThemeContext.Provider>
        </div>
    )
}
