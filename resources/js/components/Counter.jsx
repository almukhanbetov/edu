import { useState } from 'react'

export default function Counter({ start }) {
    const [count, setCount] = useState(start)

    return (
        <div className="p-4 rounded bg-gray-800">
            <p className="mb-2">
                React-счётчик: <b>{count}</b>
            </p>

            <button
                className="px-4 py-2 bg-green-600 rounded"
                onClick={() => setCount(count + 1)}
            >
                +1
            </button>
        </div>
    )
}
