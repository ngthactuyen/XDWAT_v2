<?php


class TicketService
{
    protected $userRightService;

    public function __construct()
    {
        $this->userRightService = new UserRightService();
    }

    public function getAllTicketsOfOneUser($user_id)
    {
        $sql = "select * from 71_nguyenthactuyen_tickets where user_id = $user_id";
        $ticketList = getAllData($sql);
        $ticketObjectList = [];
        foreach ($ticketList as $ticket) {
            $ticketObjectList[] = new Ticket($ticket);
        }
        $idRightsOfOneUserList = $this->userRightService->getAllIdRightsOfOneUser($_COOKIE['user_id']);

        return [
            'ticketList' => $ticketObjectList,
            'rightList' => $idRightsOfOneUserList
        ];
    }

    public function addsaveProcess()
    {
        $user_id = $_COOKIE['user_id'];
        $unsentTicketList = $this->getAllUnsentTicketsOfOneUser($user_id);
        //kiểm tra xem có ticket chưa gửi không
        if (count($unsentTicketList) === 0) {
            $sql = "insert into 71_nguyenthactuyen_tickets(user_id) value ($user_id)";
            return execute($sql);
        } else {
            return false;
        }
    }

    // Lấy ra tất cả ticket chưa được gửi của 1 user
    public function getAllUnsentTicketsOfOneUser($user_id)
    {
        $sql = "select * from 71_nguyenthactuyen_tickets where user_id = $user_id and status = -1";
        $ticketList = getAllData($sql);
        $ticketObjectList = [];
        foreach ($ticketList as $ticket) {
            $ticketObjectList[] = new Ticket($ticket);
        }
        return $ticketObjectList;
    }

    public function getOneTicketById($id)
    {
        $sql = "select * from 71_nguyenthactuyen_tickets where id = $id";
        $temp = getOneData($sql);
        return $ticket = new Ticket($temp);
    }

//    public function deleteById($id)
//    {
//        $ticket = $this->getOneTicketById($id);
//        dd($ticket);
//        if ($ticket->status == 1){ //đang mượn->không thể xóa
//            return false;
//        } else {
//            $sql = "delete from 71_nguyenthactuyen_tickets where id = $id";
//            return execute($sql);
//        }
//    }
}