import React, { useEffect, useState } from "react";
import {
  Box,
  Heading,
  Text,
  Center,
  Menu,
  HamburgerIcon,
  Select,
  CheckIcon,
  HStack,
  Stack,
  Divider,
  IconButton,
  Button,
  Input,
  View,
  Modal,
  FormControl,
  ScrollView,
  Pressable,
} from "native-base";
import { MaterialIcons, AntDesign } from "@expo/vector-icons";
import { KeyboardAvoidingView, Platform } from "react-native";
import DateTimePicker from "@react-native-community/datetimepicker";
import { useRoute } from "@react-navigation/native";
import { TouchableOpacity } from "react-native";

import env from "../../env";

const Boards = ({ navigation }) => {
  const [boards, setBoards] = useState([]);
  const [cards, setCards] = useState([]);
  const [tasks, setTasks] = useState([]);
  const [members, setMembers] = useState([]);
  const [projectId, setProjectId] = useState("");
  const route = useRoute();

  //set dummy data
  useEffect(() => {
    //id comes from previous screen i-e http://localhost:3000/main/64765c3c45057b228c05bed5
    const { id } = route.params;
    setProjectId(id);
    loadBoard(id);
    allTeam(id);
  }, []);

  let loadBoard = async (projectID) => {
    setCards([]);
    setTasks([]);
    let response = null;
    await fetch(`${env.SERVER_URL}/getboards/${projectID}`, {
      method: "GET",
      headers: {
        Accept: "application/json",
        "Content-type": "application/json",
      },
      credentials: "include",
    }).then((res) => (response = res));

    if (!response) {
      throw Error("No response from server");
    }

    const data = await response.json();

    if (data.stat === "success") {
      console.log("Boards : ", data.boards);
      data.boards.forEach(async (board) => {
        await loadCards(board._id);
      });
      setBoards(data.boards);
    }
  };

  let loadCards = async (boardId) => {
    let response = null;
    await fetch(`${env.SERVER_URL}/getcards/${boardId}`, {
      method: "GET",
      headers: {
        Accept: "application/json",
        "Content-type": "application/json",
      },
      credentials: "include",
    }).then((res) => (response = res));

    if (!response) {
      throw Error("No response from server");
    }

    const data = await response.json();

    if (data.stat === "success") {
      console.log(data);
      data.cards.forEach(async (card) => {
        await loadTasks(card._id);
      });
      setCards((prevCards) => [...prevCards, ...data.cards]);
    }
  };

  let loadTasks = async (cardId) => {
    let response = null;
    await fetch(`${env.SERVER_URL}/gettasks/${cardId}`, {
      method: "GET",
      headers: {
        Accept: "application/json",
        "Content-type": "application/json",
      },
      credentials: "include",
    }).then((res) => (response = res));

    if (!response) {
      throw Error("No response from server");
    }

    const data = await response.json();

    if (data.stat === "success") {
      console.log(data);
      setTasks((prevTasks) => [...prevTasks, ...data.tasks]);
    }
  };

  let allTeam = async (projectID) => {
    let response = null;
    await fetch(`${env.SERVER_URL}/getteam/${projectID}`, {
      method: "GET",
      headers: {
        Accept: "application/json",
        "Content-type": "application/json",
      },
      credentials: "include",
    }).then((res) => (response = res));

    if (!response) {
      throw Error("No response from server");
    }

    const data = await response.json();

    if (data.stat === "success") {
      setMembers(data?.project[0]?.teamMembers);
      console.log("Members : ", data?.project[0]?.teamMembers);
    }
  };

  //add member model
  const [showAddMemberModal, setAddMemeberModal] = useState(false);
  const [member, setMember] = useState(null);

  const handleAddMemeber = async () => {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(member)) {
      alert("Invalid Email", "Please enter a valid email address");
      return;
    }

    //perform backend logic
    let response = null;
    await fetch(`${env.SERVER_URL}/addmember`, {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-type": "application/json",
      },
      credentials: "include",
      body: JSON.stringify({
        member: member,
        id: projectId,
      }),
    }).then((res) => (response = res));

    const data = await response.json();

    if (data.stat === "success") {
      setAddMemeberModal(false);
      console.log("success member added");
      alert("Member Added Successfully");
      //finally
      await allTeam(projectId);
      setMember(null);
    } else {
      alert("Member not added, Something went wrong");
    }
  };

  //add board model
  const [showAddBoardModal, setAddBoardModal] = useState(false);
  const [boardTitle, setBoardTitle] = useState("");
  const handleAddBoard = async () => {
    if (!boardTitle) {
      alert("Please enter the title");
      return;
    }

    //perform backend logic
    let response = null;
    await fetch(`${env.SERVER_URL}/createboard`, {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-type": "application/json",
      },
      credentials: "include",
      body: JSON.stringify({
        title: boardTitle,
        id: projectId,
      }),
    }).then((res) => (response = res));

    const data = await response.json();

    if (data.stat === "success") {
      setAddBoardModal(false);
      console.log("success board");
      //finally
      await loadBoard(projectId);
      setBoardTitle(""); //must '' this
    } else {
      alert("Something went wrong");
    }
  };

  //add card model
  const [showAddCardModal, setAddCardModal] = useState(false);
  const [cardTitle, setCardTitle] = useState("");
  const [boardId, setBoardId] = useState(null);
  const handleAddCard = async () => {
    if (!cardTitle) {
      alert("Please enter the card title");
      return;
    }

    // Perform backend logic
    let response = null;
    await fetch(`${env.SERVER_URL}/createcard`, {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-type": "application/json",
      },
      credentials: "include",
      body: JSON.stringify({
        title: cardTitle,
        id: boardId,
      }),
    }).then((res) => (response = res));

    const data = await response.json();

    if (data.stat === "success") {
      setAddCardModal(false);
      console.log("Card created successfully");
      // Finally, refresh the board or perform any necessary actions
      await loadBoard(projectId);
      setCardTitle("");
    } else {
      alert("Something went wrong");
    }
  };

  //add task model
  const [cardId, setCardId] = useState(null);
  const [isAddTaskModalOpen, setAddTaskModalOpen] = useState(false);
  const [taskTitle, setTaskTitle] = useState("");
  const [taskDescription, setTaskDescription] = useState("");
  const [taskDeadline, setTaskDeadline] = useState(new Date());
  const [taskDeadline1, setTaskDeadline1] = useState(new Date());
  const [taskStatus, setTaskStatus] = useState("");
  const [taskDependencies, setTaskDependencies] = useState("");
  const [taskAssignedTo, setTaskAssignedTo] = useState("");
  const [showDatePicker, setShowDatePicker] = useState(false);

  const handleAddTask = async () => {
    // Create the task object
    const pioritity =
      taskStatus === "idol" ? 10 : taskStatus === "running" ? 5 : 0;
    const taskObj = {
      id: cardId,
      assigned: taskAssignedTo,
      deadline: taskDeadline,
      dependency: taskDependencies,
      description: taskDescription,
      title: taskTitle,
      priority: pioritity,
    };

    try {
      // Perform backend logic
      const response = await fetch(`${env.SERVER_URL}/createtask`, {
        method: "POST",
        headers: {
          Accept: "application/json",
          "Content-type": "application/json",
        },
        credentials: "include",
        body: JSON.stringify(taskObj),
      });

      const data = await response.json();

      if (data.stat === "success") {
        // Update the tasks state with the new task
        const updatedTasks = [...tasks, taskObj];
        setTasks(updatedTasks);

        // Unset all values
        setTaskAssignedTo("");
        setTaskDeadline(new Date());
        setTaskDependencies("");
        setTaskDescription("");
        setTaskTitle("");
        setCardId(null);

        alert("Task created successfully");
        await loadBoard(projectId);
        setAddTaskModalOpen(false);
      } else {
        alert("Something went wrong");
      }
    } catch (error) {
      console.log(error);
      alert("Something went wrong");
    }
  };

  //edit task
  //set data in edit model
  const handleGetPrevTask = (taskid) => {
    tasks
      .filter((task) => task._id == taskid)
      .map((task, index) => {
        setTaskTitle(task.title);
        setTaskDescription(task.title);
        setTaskDeadline(task.deadline.toString());
        setTaskStatus(task.status);
        setTaskDependencies(task.status);
        setTaskAssignedTo(task.status);
      });
  };

  //cleanup data and close model

  const cleanTaskState = () => {
    setViewTaskId(null);
    setTaskAssignedTo("");
    setTaskDeadline(new Date());
    setTaskDependencies("");
    setTaskDescription("");
    setTaskTitle("");
    setTaskStatus("");
    setEditTaskModalOpen(false);
  };

  //edit task

  const [isEditTaskModalOpen, setEditTaskModalOpen] = useState(false);
  const handleEditTask = (taskid) => {
    // Close the modal
    const updatedProperties = {
      assigned: taskAssignedTo,
      deadline: taskDeadline,
      dependency: taskDependencies,
      description: taskDescription,
      title: taskTitle,
      status: taskStatus,
    };

    const index = tasks.findIndex((task) => task._id === taskid);
    if (index !== -1) {
      const updatedTasksData = [...tasks];
      updatedTasksData[index] = {
        ...updatedTasksData[index],
        ...updatedProperties,
      };
      setTasks(updatedTasksData);
      console.table(updatedTasksData);
    }
    //unset all values
    setViewTaskId(null);
    setTaskAssignedTo("");
    setTaskDeadline(new Date());
    setTaskDependencies("");
    setTaskDescription("");
    setTaskTitle("");
    setTaskStatus("");
    alert("task  updated");
    setEditTaskModalOpen(false);
  };
  let handleDeleteBoard = async (boardId) => {
    let response = null;
    await fetch(`${env.SERVER_URL}/deleteboard`, {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-type": "application/json",
      },
      credentials: "include",
      body: JSON.stringify({
        id: boardId,
      }),
    }).then((res) => (response = res));

    const data = await response.json();
    console.log(data);
    if (data.stat === "success") {
      loadBoard(projectId);
      console.log("success delete board");
    } else {
      alert("Something went wrong");
    }
  };

  const handleDeleteCard = async (cardId) => {
    try {
      const response = await fetch(`${env.SERVER_URL}/deletecard`, {
        method: "POST",
        headers: {
          Accept: "application/json",
          "Content-type": "application/json",
        },
        credentials: "include",
        body: JSON.stringify({
          id: cardId,
        }),
      });

      const data = await response.json();
      console.log(data);

      if (data.stat === "success") {
        await loadBoard(projectId);
        console.log("Successfully deleted card");
      } else {
        alert("Something went wrong");
      }
    } catch (error) {
      console.log(error);
      alert("Something went wrong");
    }
  };

  const handleDeleteTask = async (taskId) => {
    try {
      // Perform backend logic
      const response = await fetch(`${env.SERVER_URL}/deletetask`, {
        method: "POST",
        headers: {
          Accept: "application/json",
          "Content-type": "application/json",
        },
        credentials: "include",
        body: JSON.stringify({
          id: taskId,
        }),
      });

      const data = await response.json();
      console.log(data);

      if (data.stat === "success") {
        // Remove the task from the tasks array
        loadBoard(projectId);
        console.log("Success: Task deleted");
      } else {
        alert("Something went wrong");
      }
    } catch (error) {
      console.log(error);
      alert("Something went wrong");
    }
  };

  const handleLogout = () => {
    navigation.navigate("Login");
  };
  const showDeadlinePicker = () => {
    setShowDatePicker(true);
  };

  const hideDeadlinePicker = () => {
    setShowDatePicker(false);
  };

  const handleDeadlineChange = (event, selectedDate) => {
    const currentDate = selectedDate || taskDeadline;

    setTaskDeadline(currentDate);
    hideDeadlinePicker();
  };

  //edit board
  const [showEditBoardModal, setEditBoardModal] = useState(false);
  const [editBoardId, setEditBoardId] = useState(null);
  const [editBoardTitle, setEditBoardTitle] = useState("");
  const handleEditBoard = async () => {
    if (!editBoardTitle) {
      alert("Please enter the title");
      return;
    }
    const index = boards.findIndex((board) => board._id === editBoardId);
    if (index !== -1) {
      const updatedBoardsData = [...boards];
      let boardToBeUpadted = updatedBoardsData[index];
      boardToBeUpadted.title = editBoardTitle;
      //TODO: Edit board update
      let response = null;
      await fetch(`${env.SERVER_URL}/updateboard`, {
        method: "POST",
        headers: {
          Accept: "application/json",
          "Content-type": "application/json",
        },
        credentials: "include",
        body: JSON.stringify({
          id: editBoardId,
          title: editBoardTitle,
        }),
      }).then((res) => (response = res));

      const data = await response.json();

      if (data.stat === "success") {
        setEditBoardModal(false);
        console.log("success edit board");
        //finally
        loadBoard(projectId);
        setEditBoardId(null);
        setEditBoardTitle("");
      } else {
        alert("Something went wrong");
      }
    } else {
      setEditBoardId(null);
      setEditBoardTitle("");
    }
  };

  //edit card
  const [showEditCardModal, setEditCardModal] = useState(false);
  const [editCardId, setEditCardId] = useState(null);
  const [editCardTitle, setEditCardTitle] = useState("");
  const handleEditCard = () => {
    const index = cards.findIndex((card) => card._id === editCardId);
    if (index !== -1) {
      const updatedCardsData = [...cards];
      updatedCardsData[index].title = editCardTitle;
      setCards(updatedCardsData);
      setEditCardId(null);
      setEditCardTitle("");
    } else {
      setEditCardId(null);
      setEditCardTitle("");
    }
  };

  //  show view task modal
  const [showViewTaskModal, setshowViewTaskModal] = useState(false);
  const [viewTaskId, setViewTaskId] = useState(null);
  const [viewTask, setViewTask] = useState(null);

  const ViewTaskComponent = (props) => {
    return (
      <View>
        <Center>
          <Text fontWeight={"bold"} fontFamily={"mono"} marginY={2}>
            {props.title}
          </Text>
        </Center>
        <Text>{props.value}</Text>
        <Divider m={2} />
      </View>
    );
  };

  const handleViewTask = (taskId) => {
    setshowViewTaskModal(true);
  };

  return (
    <>
      <View flex={1} safeArea backgroundColor={"#ffffff"}>
        <Box mt={8} bg="amber.400">
          <HStack
            justifyContent="space-between"
            alignItems="center"
            px={2}
            py={3}
          >
            <IconButton
              icon={<MaterialIcons name="add" size={24} color="white" />}
              onPress={() => {
                /* Handle add board logic */
                setAddBoardModal(true);
              }}
            />
            <Heading color="white" fontSize="lg" fontWeight="bold">
              Boards
            </Heading>
            <HStack space={2}>
              <IconButton
                icon={
                  <MaterialIcons name="person-add" size={24} color="white" />
                }
                onPress={() => {
                  setAddMemeberModal(true);
                }}
              />
              <View mt={3}>
                <Menu
                  w="190"
                  trigger={(triggerProps) => {
                    return (
                      <Pressable
                        accessibilityLabel="More options menu"
                        {...triggerProps}
                      >
                        <AntDesign name="linechart" size={24} color="white" />
                      </Pressable>
                    );
                  }}
                >
                  <Menu.Item
                    onPress={() => {
                      navigation.navigate("EmployeesProgress", {
                        tasks,
                      });
                    }}
                  >
                    Employees Progress
                  </Menu.Item>

                  <Menu.Item
                    onPress={() => {
                      navigation.navigate("EmployessReport", {
                        projectId: projectId,
                      });
                    }}
                  >
                    Employees Report
                  </Menu.Item>

                  <Menu.Item
                    onPress={() => {
                      navigation.navigate("ProjectProgress", {
                        tasks, //send tasks object to another screen
                      });
                    }}
                  >
                    Project Progress
                  </Menu.Item>

                  <Menu.Item
                    onPress={() => {
                      navigation.navigate("ProjectReport", {
                        projectId: projectId,
                      });
                    }}
                  >
                    Project Report
                  </Menu.Item>
                </Menu>
              </View>

              <IconButton
                icon={
                  <MaterialIcons name="exit-to-app" size={24} color="white" />
                }
                onPress={() => {
                  /* Handle sign out logic */
                  handleLogout();
                }}
              />
            </HStack>
          </HStack>
        </Box>
        <ScrollView>
          <Box flex={1} padding={3} mt={4}>
            {boards.map((board, index) => (
              <View
                key={index}
                padding={3}
                backgroundColor={"light.100"}
                mb={5}
                rounded="9"
                w="100%"
                shadow={1}
                _ios={{ shadow: 4 }}
                _android={{ borderWidth: 0 }}
                _light={{ borderColor: "amber.300" }}
                mx={{ base: "auto", md: 0 }}
              >
                <Stack
                  direction="row"
                  width={"100%"}
                  justifyContent="space-between"
                  bgColor={"muted.50"}
                  shadow={2}
                  borderRadius={5}
                  padding={2}
                  margin={1}
                >
                  <Heading _light={{ color: "blueGray.700" }}>
                    {board.title}
                  </Heading>
                  <Stack direction="row">
                    <IconButton
                      icon={
                        <MaterialIcons name="edit" size={20} color="blue" />
                      }
                      onPress={() => {
                        /* Handle edit board action */
                        setEditBoardId(board._id);
                        setEditBoardTitle(board.title);
                        setEditBoardModal(true);
                      }}
                    />

                    <IconButton
                      icon={
                        <MaterialIcons name="delete" size={20} color="red" />
                      }
                      onPress={() => {
                        /* Handle delete card action */
                        handleDeleteBoard(board._id);
                      }}
                    />
                  </Stack>
                </Stack>
                <Stack space={4} mt={4}>
                  {cards
                    .filter((card) => card.boardid === board._id)
                    .map((card, index) => (
                      <Box
                        key={index}
                        padding={4}
                        rounded="lg"
                        shadow={1}
                        _light={{ bgColor: "white", shadowColor: "gray.200" }}
                      >
                        <Stack
                          direction="row"
                          alignItems="center"
                          justifyContent="space-between"
                        >
                          <Heading size="sm">{card.title}</Heading>
                          <Stack direction="row">
                            <IconButton
                              icon={
                                <MaterialIcons
                                  name="edit"
                                  size={18}
                                  color="blue"
                                />
                              }
                              onPress={() => {
                                setEditCardId(card._id);
                                setEditCardTitle(card.title);
                                setEditCardModal(true);
                              }}
                            />
                            <IconButton
                              icon={
                                <MaterialIcons
                                  name="delete"
                                  size={18}
                                  color="red"
                                />
                              }
                              onPress={() => {
                                /* Handle delete card action */
                                handleDeleteCard(card._id);
                              }}
                            />
                          </Stack>
                        </Stack>
                        <Stack space={2} mt={2}>
                          {tasks
                            .filter((task) => task.cardid === card._id)
                            .map((task, index) => (
                              <TouchableOpacity
                                key={index}
                                onPress={() => {
                                  setViewTaskId(task._id);
                                  handleViewTask();
                                }}
                                onLongPress={() => {
                                  handleDeleteTask(task._id);
                                }}
                              >
                                <Box
                                  key={index}
                                  padding={3}
                                  rounded="md"
                                  shadow={1}
                                  _light={{
                                    bgColor: "white",
                                    shadowColor: "gray.200",
                                  }}
                                >
                                  <Text>{task.title}</Text>
                                </Box>
                              </TouchableOpacity>
                            ))}
                        </Stack>
                        <Button
                          bgColor="muted.400"
                          mt={2}
                          marginX={16}
                          borderRadius={5}
                          onPress={() => {
                            setCardId(card._id);
                            setAddTaskModalOpen(true);
                          }}
                        >
                          <Text color="white" bold>
                            Add Task
                          </Text>
                        </Button>
                      </Box>
                    ))}
                  <Divider />
                </Stack>
                <Button
                  bgColor="amber.300"
                  mt={2}
                  onPress={() => {
                    /* Handle add card action in board */
                    setBoardId(board._id);
                    setAddCardModal(true);
                  }}
                >
                  <Text color="white" fontSize={14} bold>
                    Add Card
                  </Text>
                </Button>
              </View>
            ))}
          </Box>
          <Divider />
        </ScrollView>
      </View>

      {/* Modal for adding a task */}
      <Modal
        isOpen={isAddTaskModalOpen}
        onClose={() =>

          setAddTaskModalOpen(false)}
      >
        <Modal.Content>
          <Modal.CloseButton />
          <Modal.Header>Add Task</Modal.Header>
          <Modal.Body>
            <Stack space={4}>
              <Text>Title</Text>
              <Input value={taskTitle} onChangeText={setTaskTitle} />
              <Text>Description</Text>
              <Input
                value={taskDescription}
                onChangeText={setTaskDescription}
              />
              <Text>Deadline</Text>
              <Button onPress={showDeadlinePicker}>
                <Text>
                  {(() => {
                    if (taskDeadline instanceof Date && !isNaN(taskDeadline)) {
                      return taskDeadline.toLocaleDateString();
                    } else {
                      return taskDeadline;
                    }
                  })()}
                </Text>
              </Button>
              {showDatePicker && (
                <DateTimePicker
                  testID="datePicker"
                  value={taskDeadline}
                  mode="date"
                  display="default"
                  onChange={handleDeadlineChange}
                />
              )}
              <Text>Status</Text>
              <Select
                selectedValue={taskStatus}
                minWidth="200"
                accessibilityLabel="Select Status"
                placeholder="Choose Status"
                _selectedItem={{
                  bg: "teal.600",
                  endIcon: <CheckIcon size="5" />,
                }}
                mt={1}
                onValueChange={(taskStatus) => setTaskStatus(taskStatus)}
              >
                <Select.Item label="running" value="running" />
                <Select.Item label="completed" value="complete" />
                <Select.Item label="idol" value="idol" />
              </Select>
              <Text>Dependencies</Text>
              <Select
                selectedValue={taskDependencies}
                minWidth="200"
                accessibilityLabel=""
                placeholder="Select Dependencies"
                _selectedItem={{
                  bg: "teal.600",
                  endIcon: <CheckIcon size="5" />,
                }}
                mt={1}
                onValueChange={(taskDependencies) =>
                  setTaskDependencies(taskDependencies)
                }
              >
                {tasks
                  .filter((task) => task.cardid == cardId)
                  .map((task, index) => (
                    <Select.Item
                      key={index}
                      label={task.title}
                      value={task.title}
                    />
                  ))}
              </Select>
              <Text>Assigned To</Text>
              <Select
                selectedValue={taskAssignedTo}
                minWidth="200"
                accessibilityLabel="Select Status"
                placeholder="Choose Service"
                _selectedItem={{
                  bg: "teal.600",
                  endIcon: <CheckIcon size="5" />,
                }}
                mt={1}
                onValueChange={(value) => setTaskAssignedTo(value)}
              >
                {console.log("members", members)}
                {members.map((member, index) => (
                  <Select.Item
                    key={index}
                    label={String(member)}
                    value={String(member)}
                  />
                ))}
              </Select>
            </Stack>
          </Modal.Body>
          <Modal.Footer>
            <Button.Group variant="ghost" space={2}>
              <Button onPress={() => setAddTaskModalOpen(false)}>Cancel</Button>
              <Button onPress={handleAddTask}>Add Task</Button>
            </Button.Group>
          </Modal.Footer>
        </Modal.Content>
      </Modal>

      {/* Add Memeber Model*/}
      <Modal
        isOpen={showAddMemberModal}
        onClose={() => setAddMemeberModal(false)}
      >
        <Modal.Content maxWidth="400px">
          <Modal.CloseButton />
          <Modal.Header>Add Member</Modal.Header>
          <Modal.Body>
            <KeyboardAvoidingView
              behavior={Platform.OS === "ios" ? "padding" : "height"}
              style={{ flex: 1 }}
            >
              <FormControl>
                <FormControl.Label>Member Email</FormControl.Label>
                <Input
                  onChangeText={(value) => {
                    setMember(value);
                  }}
                  autoCapitalize="none"
                  autoCorrect={false}
                />
              </FormControl>
            </KeyboardAvoidingView>
          </Modal.Body>
          <Modal.Footer>
            <Button.Group space={2}>
              <Button
                variant="ghost"
                colorScheme="blueGray"
                onPress={() => {
                  setAddMemeberModal(false);
                }}
              >
                Cancel
              </Button>
              <Button
                bgColor="amber.300"
                onPress={() => {
                  handleAddMemeber();
                  setAddMemeberModal(false);
                }}
              >
                <Text color="black">Create</Text>
              </Button>
            </Button.Group>
          </Modal.Footer>
        </Modal.Content>
      </Modal>

      {/* Add Board Model */}
      <Modal isOpen={showAddBoardModal} onClose={() => setAddBoardModal(false)}>
        <Modal.Content maxWidth="400px">
          <Modal.CloseButton />
          <Modal.Header>Add Board</Modal.Header>
          <Modal.Body>
            <FormControl>
              <FormControl.Label>Board Title</FormControl.Label>
              <Input
                value={boardTitle}
                onChangeText={(value) => {
                  setBoardTitle(value);
                }}
                autoCapitalize="none"
                autoCorrect={false}
              />
            </FormControl>
          </Modal.Body>
          <Modal.Footer>
            <Button.Group space={2}>
              <Button
                variant="ghost"
                colorScheme="blueGray"
                onPress={() => {
                  setAddBoardModal(false);
                }}
              >
                Cancel
              </Button>
              <Button
                bgColor="amber.300"
                onPress={() => {
                  handleAddBoard();
                  setAddBoardModal(false);
                }}
              >
                <Text color="black">Create</Text>
              </Button>
            </Button.Group>
          </Modal.Footer>
        </Modal.Content>
      </Modal>

      {/* Edit board modal */}

      <Modal
        isOpen={showEditBoardModal}
        onClose={() => setEditBoardModal(false)}
      >
        <Modal.Content maxWidth="400px">
          <Modal.CloseButton />
          <Modal.Header>Edit Board</Modal.Header>
          <Modal.Body>
            <FormControl>
              <FormControl.Label>Edit Board</FormControl.Label>
              <Input
                value={editBoardTitle}
                onChangeText={(value) => {
                  setEditBoardTitle(value);
                }}
                autoCapitalize="none"
                autoCorrect={false}
              />
            </FormControl>
          </Modal.Body>
          <Modal.Footer>
            <Button.Group space={2}>
              <Button
                variant="ghost"
                colorScheme="blueGray"
                onPress={() => {
                  setEditBoardId(null);
                  setEditBoardTitle("");
                  setEditBoardModal(false);
                }}
              >
                Cancel
              </Button>
              <Button
                bgColor="amber.300"
                onPress={() => {
                  handleEditBoard();
                  setEditBoardModal(false);
                }}
              >
                <Text color="black">Edit</Text>
              </Button>
            </Button.Group>
          </Modal.Footer>
        </Modal.Content>
      </Modal>

      {/* Edit card modal */}

      <Modal isOpen={showEditCardModal} onClose={() => setEditCardModal(false)}>
        <Modal.Content maxWidth="400px">
          <Modal.CloseButton />
          <Modal.Header>Edit Card</Modal.Header>
          <Modal.Body>
            <FormControl>
              <FormControl.Label>Edit Card</FormControl.Label>
              <Input
                value={editCardTitle}
                onChangeText={(value) => {
                  setEditCardTitle(value);
                }}
                autoCapitalize="none"
                autoCorrect={false}
              />
            </FormControl>
          </Modal.Body>
          <Modal.Footer>
            <Button.Group space={2}>
              <Button
                variant="ghost"
                colorScheme="blueGray"
                onPress={() => {
                  setEditCardId(null);
                  setEditCardTitle("");
                  setEditCardModal(false);
                }}
              >
                Cancel
              </Button>
              <Button
                bgColor="amber.300"
                onPress={() => {
                  handleEditCard();
                  setEditCardModal(false);
                }}
              >
                <Text color="black">Edit</Text>
              </Button>
            </Button.Group>
          </Modal.Footer>
        </Modal.Content>
      </Modal>

      {/* Add Card Model */}
      <Modal isOpen={showAddCardModal} onClose={() => setAddCardModal(false)}>
        <Modal.Content maxWidth="400px">
          <Modal.CloseButton />
          <Modal.Header>Add Card</Modal.Header>
          <Modal.Body>
            <FormControl>
              <FormControl.Label>Card Title</FormControl.Label>
              <Input
                value={cardTitle}
                onChangeText={(value) => {
                  setCardTitle(value);
                }}
                autoCapitalize="none"
                autoCorrect={false}
              />
            </FormControl>
          </Modal.Body>
          <Modal.Footer>
            <Button.Group space={2}>
              <Button
                variant="ghost"
                colorScheme="blueGray"
                onPress={() => {
                  setAddCardModal(false);
                }}
              >
                Cancel
              </Button>
              <Button
                bgColor="amber.300"
                onPress={() => {
                  handleAddCard();
                  setAddCardModal(false);
                }}
              >
                <Text color="black">Create</Text>
              </Button>
            </Button.Group>
          </Modal.Footer>
        </Modal.Content>
      </Modal>

      {/* model for view task */}
      <Center>
        <Modal
          isOpen={showViewTaskModal}
          onClose={() => setshowViewTaskModal(false)}
        >
          <Modal.Content maxWidth="400px">
            <Modal.CloseButton />
            <Modal.Header>Task Details</Modal.Header>
            <Modal.Body>
              {tasks
                .filter((task) => task._id == viewTaskId)
                .map((task, index) => (
                  <View
                    key={index}
                    flex={1}
                    padding={5}
                    space={4}
                    borderRadius={8}
                    backgroundColor={"muted.100"}
                  >
                    <ViewTaskComponent title="Title" value={task.title} />
                    <ViewTaskComponent
                      title="Description"
                      value={task.description}
                    />
                    <ViewTaskComponent
                      title="Deadline"
                      value={task.deadline.toString()}
                    />
                    <ViewTaskComponent title="Status" value={task.status} />
                    <ViewTaskComponent
                      title="Dependencies"
                      value={task.dependency}
                    />
                    <ViewTaskComponent
                      title="Assigned to"
                      value={task.assigned}
                    />
                    {/* <Button
                      variant="ghost"
                      onPress={() => {
                        navigation.navigate("TaskReport", {
                          title: task.title,
                          description: task.description,
                          deadline: task.deadline.toString(),
                          status: task.status,
                          dependency: task.dependency,
                          assigned: task.assigned,
                        });
                      }}
                    >
                      Report
                    </Button> */}
                  </View>
                ))}
            </Modal.Body>
            <Modal.Footer>
              <Button.Group space={2}>
                <Button
                  variant="ghost"
                  onPress={() => {
                    setshowViewTaskModal(false);
                    setViewTaskId(null);
                  }}
                >
                  Cancel
                </Button>

                <Button
                  variant="ghost"
                  onPress={() => {
                    setshowViewTaskModal(false);
                    handleGetPrevTask(viewTaskId);
                    setEditTaskModalOpen(true);
                  }}
                >
                  Edit Task
                </Button>

                <Button
                  bgColor={"amber.300"}
                  color={"white"}
                  onPress={() => {
                    setshowViewTaskModal(false);
                    setViewTaskId(null);
                  }}
                >
                  {" "}
                  Save
                </Button>
              </Button.Group>
            </Modal.Footer>
          </Modal.Content>
        </Modal>
      </Center>

      {/* Modal for edit a task */}
      <Modal isOpen={isEditTaskModalOpen} onClose={() => cleanTaskState()}>
        <Modal.Content>
          <Modal.CloseButton />
          <Modal.Header>Edit Task</Modal.Header>
          <Modal.Body>
            <Stack space={4}>
              <Text>Title</Text>
              <Input value={taskTitle} onChangeText={setTaskTitle} />
              <Text>Description</Text>
              <Input
                value={taskDescription}
                onChangeText={setTaskDescription}
              />
              <Text>Deadline</Text>
              <Button onPress={showDeadlinePicker}>
                <Text>
                  {(() => {
                    if (taskDeadline1 instanceof Date && !isNaN(taskDeadline1)) {
                      return taskDeadline1.toLocaleDateString();
                    } else {
                      return taskDeadline1;
                    }
                  })()}
                </Text>
              </Button>
              {showDatePicker && (
                <DateTimePicker
                  testID="datePicker"
                  // value={taskDeadline1}
                  value={(() => {
                    if (taskDeadline1 instanceof Date && !isNaN(taskDeadline1)) {
                      return taskDeadline1.toLocaleDateString();
                    } else {
                      return taskDeadline1;
                    }
                  })()}
                  mode="date"
                  display="default"
                  onChange={handleDeadlineChange}
                />
              )}
              <Text>Status</Text>
              <Select
                selectedValue={taskStatus}
                minWidth="200"
                accessibilityLabel="Select Status"
                placeholder="Choose Status"
                _selectedItem={{
                  bg: "teal.600",
                  endIcon: <CheckIcon size="5" />,
                }}
                mt={1}
                onValueChange={(taskStatus) => setTaskStatus(taskStatus)}
              >
                <Select.Item label="running" value="running" />
                <Select.Item label="completed" value="complete" />
                <Select.Item label="idol" value="idol" />
              </Select>
              <Text>Dependencies</Text>
              <Select
                selectedValue={taskDependencies}
                minWidth="200"
                accessibilityLabel=""
                placeholder="Select Dependencies"
                _selectedItem={{
                  bg: "teal.600",
                  endIcon: <CheckIcon size="5" />,
                }}
                mt={1}
                onValueChange={(taskDependencies) =>
                  setTaskDependencies(taskDependencies)
                }
              >
                {tasks
                  .filter((task) => task.cardid == cardId)
                  .map((task, index) => (
                    <Select.Item
                      key={index}
                      label={task.title}
                      value={task.title}
                    />
                  ))}
              </Select>
              <Text>Assigned To</Text>
              <Select
                selectedValue={taskAssignedTo}
                minWidth="200"
                accessibilityLabel="Select Status"
                placeholder="Choose Service"
                _selectedItem={{
                  bg: "teal.600",
                  endIcon: <CheckIcon size="5" />,
                }}
                mt={1}
                onValueChange={(value) => setTaskAssignedTo(value)}
              >
                {members.map((member, index) => (
                  <Select.Item
                    key={index}
                    label={member.email}
                    value={member.email}
                  />
                ))}
              </Select>
            </Stack>
          </Modal.Body>
          <Modal.Footer>
            <Button.Group variant="ghost" space={2}>
              <Button
                onPress={() => {
                  cleanTaskState();
                }}
              >
                Cancel
              </Button>
              <Button
                onPress={() => {
                  handleEditTask(viewTaskId);
                }}
              >
                Edit Task
              </Button>
            </Button.Group>
          </Modal.Footer>
        </Modal.Content>
      </Modal>
    </>
  );
};

export default Boards;
