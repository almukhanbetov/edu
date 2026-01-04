export default function UserCard({ user }) {
    return (
        <div className="p-4 bg-gray-800 rounded">
            <p><b>ID:</b> {user.id}</p>
            <p><b>Email:</b> {user.email}</p>
            <p><b>Имя:</b> {user.name}</p>
        </div>
    )
}