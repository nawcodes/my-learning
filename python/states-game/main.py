import turtle
import pandas


screen = turtle.Screen()
screen.title("U.S State games")
image = "blank_states_img.gif"
screen.addshape(image)
turtle.shape(image)


data = pandas.read_csv("50_states.csv")

answer_state = screen.textinput(title="Guess The State",
                                 prompt="What is the state")


guessed_state = []

state_list = data.state.to_list()

while len(guessed_state) <  50:
    answer_state = screen.textinput(title=f"{len(guessed_state)}/50 States Correct",
                                    prompt="What another state's name?")
    if answer_state == "Exit":
        missing_state = []
        for state in state_list:
            if state not in guessed_state:
                missing_state.append(state)
        new_data = pandas.DataFrame(missing_state)
        new_data.to_csv("missing_states.csv")
        break
    if(answer_state in state_list):
        guessed_state.append(answer_state)
        t = turtle.Turtle()
        t.hideturtle()
        t.penup()
        state_data = data[data.state == answer_state]
        x = state_data.x.item()
        y = state_data.y.item()
        t.goto(x,y)
        t.write(answer_state)

