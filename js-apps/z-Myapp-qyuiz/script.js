const quizData = [
    {
        question : 'Kenapa anda masih melajang ?',
        a : 'Lagi trendi',
        b : '2D lebih HOT daripada 3D',
        c : 'Aku terlalu hebat dimiliki seseorang.',
        d : 'Udah Nasib',
        correct:  'd'
    },
    {
        question : 'What us the most used programing language in 2019?',
        a : 'java',
        b : 'C',
        c : 'Pyton',
        d : 'JavaScript',
        correct:  'a'
    },
    {
        question : 'What is he President Of US?',
        a : 'Florin Pop',
        b : 'Donald Trump',
        c : 'Ivan Saldano',
        d : 'Mihai Andrei',
        correct:  'b'
    },
    {
        question : 'What does HTML stand for?',
        a : 'Hypertext Markup Language',
        b : 'Cascading Style Sheet',
        c : 'Jason Object Notation',
        d : 'Application Programming Interface',
        correct:  'a'
    },
    {
        question : 'What year was JavaScript launched?',
        a : '2020',
        b : '2019',
        c : '2018',
        d : 'non of the above',
        correct:  'd'
    },
];


const quiz = document.getElementById('quiz');
const questionEl = document.getElementById('questionId');
const answerEls = document.querySelectorAll('.answer');
const a_text = document.getElementById('a_text');
const b_text = document.getElementById('b_text');
const c_text = document.getElementById('c_text');
const d_text = document.getElementById('d_text');
const btnSubmit = document.getElementById('submit');



let currentQuizData = 0;
let score = 0;

// run();

function run() {
    deselect();
    const untilQuizData = quizData[currentQuizData];
    questionEl.innerHTML = untilQuizData.question;
    a_text.innerHTML = untilQuizData.a
    b_text.innerHTML = untilQuizData.b
    c_text.innerHTML = untilQuizData.c
    d_text.innerHTML = untilQuizData.d
}


function beginTemp() {
    quiz.innerHTML = quiz.innerHTML = `<h2>Atention!</h2>
    <p style="text-align:center; background-color: red; ">Before you start the quiz, hope you read the rules.</p>
    <ul style="text-align:center">
        <li>You have 5 minutes</li>
        <li>Do Not Googling</li>
        <li>Do Not Eat And Drink During Test Run</li>
        <li>Do No Seeing To Another Friends</li>
    </ul>
    <button id="btnStart">Start Quiz</button>`;
}

beginTemp();
const btnStart = document.getElementById('btnStart');


btnStart.addEventListener("click", function() {
    


});



function getSelected() {
    const answerEl = document.querySelectorAll('.answer');

    let answer = undefined;
    
    answerEl.forEach(an => {
        if(an.checked) {
            answer = an.id;
        }
    });

    return answer;

}

function deselect() {
    answerEls.forEach(a => {
        a.checked = false;
    });
}



btnSubmit.addEventListener('click', () => {

    let answer = getSelected();


    if(answer) {

        if(answer === quizData[currentQuizData].correct) {
            score++;
        }

        currentQuizData++;
        if(currentQuizData < quizData.length) {
            run();
        }else{
            quiz.innerHTML = `<h2>You answered correctly at ${score}/${quizData.length}</h2>
            <button onClick="location.reload()">Reload</button>`;
        }

    }



});


function timer() {
    const setTime = 60 * 0.1; // result second
    
    var time = setTime;

    const timeEl = document.querySelector('.time');

    const runTime = setInterval(() => {
        minutes = parseInt(time / 60, 10);
        seconds = parseInt(time % 60, 10); 

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        timeEl.innerHTML = minutes + ' : ' + seconds;
        

        if(--time < 0) {
            clearInterval(runTime)
        }

        console.log(minutes);
    }, 1000);
   

}

// timer();





