import './bootstrap';
import React from 'react';
import { createRoot } from 'react-dom/client';
import LessonPlayer from './react/LessonPlayer';

const el = document.getElementById('lesson-player');

if (el) {
    createRoot(el).render(
        <LessonPlayer
            lessonId={el.dataset.lessonId}
            video={el.dataset.video}
        />
    );
}

