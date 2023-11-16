<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis Interaktif</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #EBF3E8;
        }

        .card {
            max-width: 600px;
            margin: auto;
            margin-top: 10%;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .quiz-container {
            padding: 20px;
        }

        .result {
            font-weight: bold;
            margin-top: 20px;
        }

        .btn-answer {
            width: 100%;
            margin-top: 10px;
        }

        .btn-exit {
            width: 100%;
            margin-top: 20px;
        }

        .exit-container {
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="card">
        <div class="card-body quiz-container row">
            <!-- Input nama -->
            <div id="name-input" class="mb-3">
                <h2 class="mb-4">Quiz Hidrometeorologi</h2>
                <label for="inputName" class="form-label">Masukkan Nama Anda:</label>
                <input type="text" class="form-control" id="inputName">
                <button class="btn btn-primary mt-2" onclick="startQuiz()">Mulai Kuis</button>
                <a href="../quiz.php" class="btn btn-danger mt-2">Keluar</a>
            </div>

            <!-- Kuis container (akan muncul setelah input nama) -->
            <div id="quiz" class="" style="display: none;">
                <!-- Soal dan jawaban -->
            </div>

            <!-- Hasil Skor -->
            <div id="results" class="result"></div>

            <!-- Tombol Exit -->
            <div class="exit-container col-sm-4">
                <button id="exitBtn" class="btn btn-danger btn-exit" onclick="exitQuiz()"
                    style="display: none;">Keluar</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS dan Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var currentQuestionIndex = 0;
        var score = 0;
        var playerName = "";

        var questions = [
            { //1
                question: "Yang termasuk bencana hidrometeorologi?",
                answers: [
                    { text: "Konflik", correct: false },
                    { text: "Gempa", correct: false },
                    { text: "Tsunami", correct: true },
                    { text: "Wabah", correct: false }
                ]
            },
            { //2
                question: "Apa yang dimaksud dengan bencana hidrometeorologi?",
                answers: [
                    { text: "Bencana yang disebabkan oleh aktivitas manusia di perairan", correct: false },
                    { text: "Bencana yang disebabkan oleh faktor meteorologi dan air", correct: true },
                    { text: "Bencana yang hanya melibatkan faktor cuaca", correct: false },
                    { text: "Bencana yang disebabkan oleh kebakaran hutan", correct: false }
                ]
            },
            { //3
                question: "Contoh bencana hidrometeorologi yang melibatkan pengangkutan material oleh air disebut...",
                answers: [
                    { text: "Gempa bumi", correct: false },
                    { text: "Tanah longsor", correct: true },
                    { text: "Banjir", correct: false },
                    { text: "Badai salju", correct: false }
                ]
            },
            { //4
                question: "Apa yang dapat menjadi penyebab banjir secara hidrometeorologi?",
                answers: [
                    { text: "Peningkatan ketinggian permukaan laut", correct: false },
                    { text: "Hujan lebat dan aliran air sungai yang tinggi", correct: true },
                    { text: "Pencemaran air sungai", correct: false },
                    { text: "Penurunan suhu udara secara tiba-tiba", correct: false }
                ]
            },
            { //5
                question: "Manakah pernyataan berikut yang benar tentang topan?",
                answers: [
                    { text: "Topan adalah badai salju yang disertai angin kencang", correct: false },
                    { text: "Topan adalah siklon tropis yang memiliki angin berkecepatan tinggi dan mendalam", correct: true },
                    { text: "Topan hanya terjadi di daerah kutub", correct: false },
                    { text: "Topan disebabkan oleh perubahan iklim global", correct: false }
                ]
            },
            { //6
                question: "Apa yang dapat dilakukan untuk memitigasi risiko bencana hidrometeorologi seperti banjir?",
                answers: [
                    { text: "Meningkatkan penebangan hutan", correct: false },
                    { text: "Membangun tanggul dan sistem pengendalian banjir", correct: true },
                    { text: "Mengabaikan drainase perkotaan", correct: false },
                    { text: "Menyebarkan limbah industri ke sungai", correct: false }
                ]
            },
            { //7
                question: "Apakah peran sistem peringatan dini dalam penanggulangan bencana hidrometeorologi?",
                answers: [
                    { text: "Meningkatkan intensitas hujan", correct: false },
                    { text: "Memberikan informasi cepat dan peringatan kepada masyarakat tentang potensi bahaya", correct: true },
                    { text: "Menyebabkan kebakaran hutan", correct: false },
                    { text: "Mengurangi kelembapan udara", correct: false }
                ]
            },
            { //8
                question: "Apa yang dapat dilakukan untuk mengurangi risiko bencana hidrometeorologi di wilayah rawan tanah longsor?",
                answers: [
                    { text: "Meningkatkan curah hujan", correct: false },
                    { text: "Menanam pepohonan untuk memperkuat tanah", correct: true },
                    { text: "Membangun permukiman di lereng bukit", correct: false },
                    { text: "Menambah beban tanah di lereng curam", correct: false }
                ]
            },
            { //9
                question: "Apakah efek pemanasan global dapat mempengaruhi kejadian bencana hidrometeorologi?",
                answers: [
                    { text: "Tidak, karena pemanasan global hanya berdampak pada suhu udara", correct: false },
                    { text: "Ya, dapat meningkatkan frekuensi dan intensitas kejadian seperti banjir dan topan", correct: true },
                    { text: "Tidak ada hubungannya antara pemanasan global dan bencana hidrometeorologi", correct: false },
                    { text: "Hanya berdampak pada tanah longsor", correct: false }
                ]
            },
            { //10
                question: "Bagaimana peran komunitas lokal dalam penanggulangan bencana hidrometeorologi?",
                answers: [
                    { text: "Meningkatkan risiko dengan tidak melakukan persiapan", correct: false },
                    { text: "Terlibat dalam perencanaan dan persiapan, serta mematuhi petunjuk evakuasi", correct: true },
                    { text: "Melakukan deforestasi secara besar-besaran", correct: false },
                    { text: "Mengabaikan peringatan dini", correct: false }
                ]
            },
            { //11
                question: "Apa yang dimaksud dengan bencana hidrometeorologi?",
                answers: [
                    { text: "Bencana yang disebabkan oleh aktivitas manusia di perairan", correct: false },
                    { text: "Bencana yang disebabkan oleh faktor meteorologi dan air", correct: true },
                    { text: "Bencana yang hanya melibatkan faktor cuaca", correct: false },
                    { text: "Bencana yang disebabkan oleh penanggulangan bencana", correct: false }
                ]
            },
            { //12
                question: "Contoh bencana hidrometeorologi yang melibatkan kejadian gelombang air laut yang tinggi disebut...",
                answers: [
                    { text: "Banjir", correct: false },
                    { text: "Badai surut", correct: true },
                    { text: "Tanah longsor", correct: false },
                    { text: "Topan", correct: false }
                ]
            },
            { //13
                question: "Apa yang dapat menjadi penyebab banjir secara hidrometeorologi?",
                answers: [
                    { text: "Peningkatan ketinggian permukaan laut", correct: false },
                    { text: "Hujan lebat dan aliran sungai yang tinggi", correct: true },
                    { text: "Pencemaran air sungai", correct: false },
                    { text: "Penurunan suhu udara secara tiba-tiba", correct: false }
                ]
            },
            { //14
                question: "Manakah langkah yang efektif dalam penanggulangan bencana banjir?",
                answers: [
                    { text: "Membuang sampah sembarangan ke sungai", correct: false },
                    { text: "Meningkatkan sistem drainase kota", correct: true },
                    { text: "Membangun permukiman di daerah rawan banjir", correct: false },
                    { text: "Menebang hutan di sepanjang aliran sungai", correct: false }
                ]
            },
            { //15
                question: "Bagaimana peran sistem peringatan dini dalam penanggulangan bencana hidrometeorologi?",
                answers: [
                    { text: "Menyebabkan kebakaran hutan", correct: false },
                    { text: "Memberikan informasi cepat dan peringatan kepada masyarakat tentang potensi bahaya", correct: true },
                    { text: "Meningkatkan intensitas hujan", correct: false },
                    { text: "Mengurangi kelembapan udara", correct: false }
                ]
            },
            { //16
                question: "Apa yang dapat dilakukan oleh komunitas lokal untuk meningkatkan ketangguhan terhadap bencana banjir?",
                answers: [
                    { text: "Mengabaikan peringatan dini", correct: false },
                    { text: "Terlibat dalam latihan evakuasi dan memahami rute evakuasi", correct: true },
                    { text: "Membuang sampah ke sungai", correct: false },
                    { text: "Membangun tanggul pribadi", correct: false }
                ]
            },
            { //17
                question: "Apakah regulasi yang ketat terkait tata ruang dan penggunaan lahan dapat membantu dalam penanggulangan bencana hidrometeorologi?",
                answers: [
                    { text: "Tidak, karena regulasi tersebut hanya membatasi pembangunan", correct: false },
                    { text: "Ya, dapat mengurangi risiko dan dampak banjir", correct: true },
                    { text: "Tidak ada korelasi antara regulasi dan bencana hidrometeorologi", correct: false },
                    { text: "Meningkatkan risiko banjir", correct: false }
                ]
            },
            { //18
                question: "Apa yang dapat dilakukan oleh pemerintah untuk meningkatkan penanggulangan bencana hidrometeorologi?",
                answers: [
                    { text: "Mengurangi alokasi anggaran untuk penanggulangan bencana", correct: false },
                    { text: "Meningkatkan pemahaman masyarakat melalui kampanye informasi", correct: true },
                    { text: "Mengabaikan sistem peringatan dini", correct: false },
                    { text: "Tidak melakukan perbaikan infrastruktur", correct: false }
                ]
            },
            { //19
                question: "Bagaimana pentingnya pendidikan tentang bencana hidrometeorologi di sekolah dan masyarakat?",
                answers: [
                    { text: "Tidak penting, karena bencana hanya terjadi secara alamiah", correct: false },
                    { text: "Sangat penting untuk meningkatkan kesadaran dan persiapan dalam menghadapi bencana", correct: true },
                    { text: "Cukup penting, tetapi tidak memerlukan tindakan konkret", correct: false },
                    { text: "Meningkatkan risiko bencana", correct: false }
                ]
            },
            { //20
                question: "Apa yang dapat dilakukan untuk meningkatkan ketangguhan infrastruktur kritis terhadap bencana hidrometeorologi?",
                answers: [
                    { text: "Tidak melakukan pemeliharaan rutin", correct: false },
                    { text: "Melakukan inspeksi dan pemeliharaan teratur pada infrastruktur kritis", correct: true },
                    { text: "Meningkatkan konsumsi air sungai", correct: false },
                    { text: "Mengurangi kapasitas saluran air", correct: false }
                ]
            },
            // Tambahkan soal dan jawaban lainnya sesuai kebutuhan
        ];

        function startQuiz() {
            playerName = document.getElementById("inputName").value;
            if (playerName.trim() === "") {
                alert("Masukkan nama Anda terlebih dahulu.");
                return;
            }

            var shuffledQuestions = shuffle(questions);
            showQuestion(shuffledQuestions[currentQuestionIndex]);

            document.getElementById("name-input").style.display = "none";
            document.getElementById("quiz").style.display = "block";
            document.getElementById("exitBtn").style.display = "block";
        }

        function shuffle(array) {
            return array.sort(() => Math.random() - 0.5);
        }

        function showQuestion(question) {
            var quizContainer = document.getElementById("quiz");
            quizContainer.innerHTML = "";

            var questionElement = document.createElement("div");
            questionElement.className = "mb-3";
            questionElement.innerText = question.question;
            quizContainer.appendChild(questionElement);

            var shuffledAnswers = shuffle(question.answers);

            shuffledAnswers.forEach(function (answer) {
                var button = document.createElement("button");
                button.innerText = answer.text;
                button.className = "btn btn-primary btn-answer";
                button.addEventListener("click", function () {
                    selectAnswer(answer, shuffledAnswers);
                });
                quizContainer.appendChild(button);
            });
        }

        function selectAnswer(selectedAnswer, shuffledAnswers) {
            if (selectedAnswer.correct) {
                score++;
            }

            currentQuestionIndex++;
            if (currentQuestionIndex < questions.length) {
                showQuestion(questions[currentQuestionIndex]);
            } else {
                endQuiz();
            }
        }

        function endQuiz() {
            var quizContainer = document.getElementById("quiz");
            quizContainer.innerHTML = "";

            var resultsContainer = document.getElementById("results");
            resultsContainer.innerHTML = "<h2 class='text-center m'>Hasil Kuis</h2>";
            resultsContainer.innerHTML += "<h2 style='text-transform: capitalize'>Nama: " + playerName + "</h2>";
            resultsContainer.innerHTML += "<h2>Skor Anda: <strong> " + score + "/" + questions.length + "</strong> </h2>";
            resultsContainer.innerHTML += "<h2>Nilai: <strong>" + score * 5 + "</strong> </h2>";
        }

        function exitQuiz() {
            var confirmExit = confirm("Apakah Anda yakin ingin keluar dari kuis?");
            if (confirmExit) {
                window.location.href = "../quiz.php";
            }
        }
    </script>

</body>

</html>