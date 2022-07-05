# The graphics module:
import turtle

# The random module:
import random

# Points earned by player:
points = 0

# Used for sprite sheets:
movement = 0

# The direction:
direction = "right"

# The speed
speed = 3

# While playing game:
playing = True

# Set-up screen dimensions:
turtle.setup(500, 500)

# Create a screen variable to be able to manipulate the window:
win = turtle.Screen()

# Set-up screen background:
win.bgpic("grass.gif")

# Set window title:
win.title("Carrot Hunt: {} points".format(points))

# Create a player:
player = turtle.Turtle()

# Player's movements don't leave any traces:
player.penup()

# Create an object:
food = turtle.Turtle()

# Object's movements don't leave any traces:
food.penup()

# The object moves instantly:
food.speed(0)

# The object's position is a random one:
food.goto(random.randint(-200, 200), random.randint(-200, 200))

# Upload sprite sheets:
for direction in ["down", "up", "left", "right"]:
    for i in range(4):
        win.addshape("{}{}.gif".format(direction, i))
win.addshape("carrot.gif")
win.addshape ("battery.gif")

# Set images for player and object:
player.shape("{}{}.gif".format(direction, movement, delay=100000))
food.shape("carrot.gif")

def left():
    global player, direction
    # Set orientation at 180 degrees:
    player.setheading(180)
    direction = "left"

def right():
    global player, direction
    player.setheading(0)
    # Set orientation at 0 degrees:
    direction = "right"

def up():
    global player, direction
    # Set orientation at 90 degrees:
    player.setheading(90)
    direction = "up"

def down():
    global player, direction
    # Set orientation at 270 or -90 degrees:
    player.setheading(-90)
    direction = "down"

# Set-up actions for arrows:
win.onkey(left, "Left")
win.onkey(right, "Right")
win.onkey(up, "Up")
win.onkey(down, "Down")

# Begin to listen to events:
win.listen()

# Distance from 2 points at square
def dist(p1, p2):
    return (p1[0] - p2[0]) ** 2 + (p1[1] - p2[1]) ** 2

# Main loop:
while playing:

    # Player advances:
    player.forward(speed)

    # Player's sprite changes:
    movement = (movement + 1) % 4
    player.shape("{}{}.gif".format(direction, movement))

    # Take player's and object's position:
    food_x, food_y = food.position()
    player_x, player_y = player.position()

    # If the player touches the window's edge, GAME OVER
    if player_x <= -220 or player_x >= 220 or player_y <= -220 or player_y >= 220:
        win.title("GAME OVER")

        playing = False

        #Play sound:
        #import winsound
        freq=600
        duration=100
        #winsound.Beep (freq, duration)
        freq=500
        duration=100
        #winsound.Beep (freq, duration)
        freq=400
        duration=100
        #winsound.Beep (freq, duration)
        freq=200
        duration=300
        #winsound.Beep (freq, duration)

        # Delete all graphics from the screen and set-up the background picture again:
        win.clear()
        win.bgpic("grass.gif")

        # Show the *GAME OVER* message:
        food.goto(0, 0)
        food.write("GAME OVER", align="center", font=("Segoe Print", 40))
        food.goto(0,-20)
        food.write("Total score: {} points.".format(points), align='center', font=('Segoe Print', 20))
        food.goto(0,-43)
        food.write("Click   to   exit", align="center", font=("Segoe Print", 12))

        # The window closes on click:
        win.exitonclick()



    # If the player collects any object:
    if abs(food_x - player_x) <= 25 and abs(food_y - player_y) <= 25:

        # Play sound
        #import winsound
        freq=600
        duration=50
        #winsound.Beep (freq, duration)
        freq=800
        duration=200
        #winsound.Beep (freq, duration)

        if points % 5 == 0:
            speed+=2;
        # Increase the number of points:
        points += 1
        win.title("Carrot Hunt: {} points".format(points))

        # The object is repositioned so that it is not too close to the player:
        while dist((food_x, food_y), player.position()) <= 50000:
            food_x, food_y = random.randint(-200, 200), random.randint(-200, 200)

        food.goto(food_x, food_y)

        if points % 5 ==0:
            food.shape("battery.gif")
        else:
            food.shape("carrot.gif")
        # The speed increases from 2 to 2 points
        if points % 2 == 0 & points%5!=0:
            speed += 1
        elif (points+1) % 5 ==0:
            speed+=2
