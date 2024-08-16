#include <stdio.h>
#include <conio.h>
#include <stdlib.h>
#include <stdbool.h>
#include <time.h>
#include <windows.h>

#define WIDTH 20
#define HEIGHT 10

int length;
int gameOver;
int score;
int headX, headY;
int fruitX, fruitY;
int tailX[100], tailY[100];

enum Direction { STOP = 0, LEFT, RIGHT, UP, DOWN };
enum Direction dir;

void setup() {
    gameOver = 0;
    dir = STOP;
    headX = WIDTH / 2;
    headY = HEIGHT / 2;
    fruitX = rand() % WIDTH;
    fruitY = rand() % HEIGHT;
    score = 0;
}

void drawBorder() {
    for (int i = 0; i < WIDTH + 2; i++)
        printf("#");
    printf("\n");
}

void drawGame() {
    for (int i = 0; i < HEIGHT; i++) {
        for (int j = 0; j < WIDTH; j++) {
            if (j == 0)
                printf("#");

            if (i == headY && j == headX)
                printf("O");
            else if (i == fruitY && j == fruitX)
                printf("F");
            else {
                int printTail = 0;
                for (int k = 0; k < length; k++) {
                    if (tailX[k] == j && tailY[k] == i) {
                        printf("o");
                        printTail = 1;
                    }
                }

                if (!printTail)
                    printf(" ");
            }

            if (j == WIDTH - 1)
                printf("#");
        }
        printf("\n");
    }
}

void draw() {
    system("cls");
    drawBorder();
    drawGame();
    drawBorder();
    printf("Score: %d\n", score);
}

void input() {
    if (_kbhit()) {
        switch (_getch()) {
            case 'a':
                dir = (dir != RIGHT) ? LEFT : dir;
                break;
            case 'd':
                dir = (dir != LEFT) ? RIGHT : dir;
                break;
            case 'w':
                dir = (dir != DOWN) ? UP : dir;
                break;
            case 's':
                dir = (dir != UP) ? DOWN : dir;
                break;
            case 'x':
                gameOver = 1;
                break;
        }
    }
}

void move() {
    int prevX = tailX[0];
    int prevY = tailY[0];
    int prev2X, prev2Y;
    tailX[0] = headX;
    tailY[0] = headY;

    for (int i = 1; i < length; i++) {
        prev2X = tailX[i];
        prev2Y = tailY[i];
        tailX[i] = prevX;
        tailY[i] = prevY;
        prevX = prev2X;
        prevY = prev2Y;
    }

    switch (dir) {
        case LEFT:
            headX--;
            break;
        case RIGHT:
            headX++;
            break;
        case UP:
            headY--;
            break;
        case DOWN:
            headY++;
            break;
    }
}

void checkCollision() {
    if (headX < 0) headX = WIDTH - 1;
    if (headX >= WIDTH) headX = 0;
    if (headY < 0) headY = HEIGHT - 1;
    if (headY >= HEIGHT) headY = 0;

    for (int i = 0; i < length; i++) {
        if (tailX[i] == headX && tailY[i] == headY)
            gameOver = 1;
    }
}

void generateFruit() {
    if (headX == fruitX && headY == fruitY) {
        score += 10;
        fruitX = rand() % WIDTH;
        fruitY = rand() % HEIGHT;
        length++;
    }
}

int main() {
    setup();
    srand(time(NULL));

    while (!gameOver) {
        draw();
        input();
        move();
        checkCollision();
        generateFruit();
        Sleep(100); // Adjust the speed of the game
    }

    printf("Game Over! Your score: %d\n", score);

    return 0;
}
