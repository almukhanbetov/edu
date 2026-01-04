import { useState } from 'react'
import axios from 'axios'

export default function ProfileForm({ user }) {
    const [name, setName] = useState(user.name)
    const [status, setStatus] = useState('')

    const submit = async () => {
        try {
            const res = await axios.post('/profile/update', {
                name,
            })

            setStatus('Сохранено ✅')
        } catch (e) {
            setStatus('Ошибка ❌')
        }
    }

    return (
        <div className="p-4 bg-gray-800 rounded max-w-md">
            <h2 className="text-lg mb-2">Профиль</h2>

            <input
                className="w-full mb-2 p-2 bg-gray-700 rounded"
                value={name}
                onChange={e => setName(e.target.value)}
            />

            <button
                className="px-4 py-2 bg-green-600 rounded"
                onClick={submit}
            >
                Сохранить
            </button>

            {status && (
                <p className="mt-2 text-sm">{status}</p>
            )}
        </div>
    )
}
